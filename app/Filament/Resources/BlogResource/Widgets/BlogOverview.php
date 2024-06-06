<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Blog;
use App\Models\User;
class BlogOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total_post = Blog::count();
        $post_views = Blog::sum('views');
        $total_users = User::count();
        return [
            Stat::make('Total Posts',$total_post),
            Stat::make('Total Page Views',$post_views),
            Stat::make('Users',$total_users),
        ];
    }
}
