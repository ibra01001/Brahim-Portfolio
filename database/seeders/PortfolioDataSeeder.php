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

        // 2. Ensure default profile exists (PostgreSQL-native, no SQLite fallback)
        // If you need to import legacy SQLite data, use a one-off command:
        //   sqlite3 database/database.sqlite .dump | psql $DATABASE_URL
        // or run with LEGACY_SQLITE_IMPORT=true (see docs/migration-sqlite-pgsql.md)
        Profile::firstOrCreate(
            ['email' => 'mohamedremili500@gmail.com'],
            [
                'name'     => 'BRAHIM REMILI',
                'image'    => 'https://res.cloudinary.com/deveventhub/image/upload/v1789744789/profile/ox8jodicc6eez8tn7wap.jpg',
                'title'    => 'Software Developer',
                'github'   => 'https://github.com/ibra01001',
                'linkedin' => 'https://www.linkedin.com/in/brahim-mohamed-mokhtar-remili-15b907370/',
            ]
        );
    }
}
