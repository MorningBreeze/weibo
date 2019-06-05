<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=\App\Models\User::all();
        $user =$users->first();
        $user_id =$user->id;

        //获取去掉除ID为1的所有用户ID数组
        $followers =$users->slice(1);
        //pluck 方法是取得结果集第一列特定字段，它返回是字符串；
        $follower_ids=$followers->pluck('id')->toArray();

        //关注除了1 号用户以外的所有用户 都来关注1号
        foreach ($followers as $follower){
            $follower->follow($user_id);
        }
    }
}
