<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PortfolioDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ensure Admin user exists
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
            ]
        );

        // 2. Check if we can migrate data from SQLite if present
        $sqlitePath = database_path('database.sqlite');
        if (file_exists($sqlitePath)) {
            try {
                $sqlite = new \PDO("sqlite:" . $sqlitePath);
                $stmt = $sqlite->query("SELECT * FROM profiles LIMIT 1");
                $sqliteProfile = $stmt ? $stmt->fetch(\PDO::FETCH_ASSOC) : null;

                if ($sqliteProfile) {
                    Profile::updateOrCreate(
                        ['email' => $sqliteProfile['email'] ?? 'mohamedremili500@gmail.com'],
                        [
                            'name' => $sqliteProfile['name'] ?? 'BRAHIM REMILI',
                            'image' => $sqliteProfile['image'] ?? null,
                            'title' => $sqliteProfile['title'] ?? 'Software Developer',
                            'bio' => $sqliteProfile['bio'] ?? null,
                            'github' => $sqliteProfile['github'] ?? 'https://github.com/ibra01001',
                            'linkedin' => $sqliteProfile['linkedin'] ?? null,
                            'twitter' => $sqliteProfile['twitter'] ?? null,
                        ]
                    );
                    $this->command?->info("Profile data migrated from SQLite to PostgreSQL.");
                    return;
                }
            } catch (\Throwable $e) {
                $this->command?->warn("Could not read SQLite file: " . $e->getMessage());
            }
        }

        // Fallback default profile if not exists
        Profile::firstOrCreate(
            ['email' => 'mohamedremili500@gmail.com'],
            [
                'name' => 'BRAHIM REMILI',
                'title' => 'Software Developer',
                'github' => 'https://github.com/ibra01001',
            ]
        );
    }
}
