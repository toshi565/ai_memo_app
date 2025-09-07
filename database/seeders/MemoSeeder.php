<?php

namespace Database\Seeders;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テストユーザーを取得または作成
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // サンプルメモを作成
        $memos = [
            [
                'title' => 'PHP',
                'body' => 'PHPは、Hypertext Preprocessorの略です。',
            ],
            [
                'title' => 'HTML',
                'body' => 'HTMLは、Hypertext Markup Languageの略です。',
            ],
            [
                'title' => 'CSS',
                'body' => "CSSは、\nCascading Style Sheets\nの略です。",
            ],
            [
                'title' => '混在',
                'body' => "Test123 てすとアイウエオｱｲｳｴｵ\n漢字！ＡＢＣ ａｂｃ １２３   😊✨",
            ],
        ];

        foreach ($memos as $memo) {
            $user->memos()->create($memo);
        }
    }
}
