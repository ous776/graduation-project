<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use App\Models\Group;
use App\Models\GroupMembership;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function home()
    {
        $friends = [];
        foreach (auth()->user()->friends as $friendship) {
            array_push($friends, $friendship->friend->id);
        };

        $friendPosts = Post::whereIn('user_id', $friends)->orderBy('created_at', 'desc')->get();
        $principalPosts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $posts = $principalPosts->concat($friendPosts)->sortBy('id')->reverse();

        return view('home', ['posts' => $posts]);
    }

    public function profile_edit()
    {
        return view('profile_edit', [
            'principal' => auth()->user(),
        ]);
    }

    public function profile_update(Request $request, User $principal)
    {
        $request->validate([
            'profile_photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:8192']
        ]);

        if ($photo = $request->file('profile_photo')) {
            $path = Storage::disk('public')->put('Avatars', $photo);
            $oldPath = $principal->profile_photo_path;
            $principal->profile_photo_path = $path;
            $principal->save();
            if ($oldPath) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $principal->update([
            'full_name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('edit-profile')->with('success', 'Profile updated successfully.');
    }

    public function password_update(Request $request, User $principal)
    {
        session(['pwd-tab' => true]);

        $request->validate([
            'current_password' => ['required', 'current_password', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8', 'max:255'],
        ]);

        $principal->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('edit-profile')->with([
            'password-success' => 'Password updated successfully.',
            'pwd-tab' => true,
        ]);
    }

    public function sign_in()
    {

        return view('sign_in');
    }

    public function delete_post(Request $request, Post $post)
    {
        $post->delete();
        $redirectTo = $request->query('route', route('dashboard'));
        $param = null;

        if ($redirectTo === 'group-detail') {
            $param = $request->query('gId');
            return redirect()->route($redirectTo, $param)->with('success', 'Post deleted successfully.');
        }

        return redirect()->route($redirectTo)->with('success', 'Post deleted successfully.');
    }

    public function group()
    {
        $groups = Group::all();
        return view('group', [
            'groups' => $groups,
        ]);
    }

    public function join_group($groupID)
    {
        $membership = GroupMembership::create([
            'group_id' => $groupID,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('groups')->with('success', 'Joined the group successfully.');
    }

    public function leave_group($groupID)
    {
        $userID = Auth::user()->id;
        $membership = GroupMembership::where('group_id', $groupID)->where('user_id', $userID)->first();
        $membership->delete();        
        return redirect()->route('groups')->with('success', 'You left the group successfully.');
    }
    
    public function create_group()
    {
        return view('create_group');
    }

    public function store_group(Request $request)
    {
        $imageName = "";
        if ($request->hasFile('group_photo')) {
            $image = $request->file('group_photo');
            $imageName = Storage::disk('public')->put('Group/Profile', $image);
        }

        $group = Group::create([
            'name' => $request->group_name,
            'description' => $request->group_desc,
            'user_id' => $request->user()->id,
            'photo' => $imageName ? $imageName : null,
        ]);

        return redirect(route('create_group'));
    }

    public function group_detail(Group $group)
    {
        $memberIds = $group->allMembers->map(function ($member) {
            return $member->id;
        })->all();

        return view('group-detail', [
            'group' => $group,
            'posts' => $group->posts->whereIn('user_id', $memberIds),
        ]);
    }

    public function sign_up()
    {

        return view('signup');
    }

    public function job_offer()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('job_offer', ['posts' => $posts]);
    }

    public function add_info()
    {

        return view('addinfo');
    }

    public function profile()
    {
        $posts = Post::all();

        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('profile', ['posts' => $posts]);

        return view('profile');
    }

    public function account_setting()
    {

        return view('account_setting');
    }

    public function privacy_settings()
    {

        return view('privacy_setting');
    }


    public function calender()
    {

        return view('calender');
    }

    public function gallery()
    {

        return view('gallery');
    }

    public function file()
    {

        return view('file');
    }

    public function news()
    {

        return view('news');
    }

    public function cafeteria()
    {

        return view('cafeteria');
    }

    public function notification()
    {

        return view('notification');
    }

    public function friend()
    {
        $principal = auth()->user();

        $users = User::where('id', '<>', auth()->user()->id)->get();

        // users = [1, 2, 5, 6]
        // users->filter([false, true, true, false])
        // users = [2, 5]
        $users = $users->filter(function ($user, $key) use ($principal) {
            foreach ($principal->friends as $friendship) {
                if ($friendship->friend->id === $user->id) {
                    return false;
                }
            }
            return true;
        });

        return view(
            'friend',
            [
                'users' => $users,
                'principal' => $principal,
            ]
        );
    }

    public function addFriend(User $friend)
    {
        Friendship::create([
            'friend_id' => $friend->id,
            'user_id' => auth()->user()->id,
        ]);

        Friendship::create([
            'friend_id' => auth()->user()->id,
            'user_id' => $friend->id,
        ]);

        return redirect()->route('friend');
    }

    public function deleteFriend(Friendship $friend)
    {
        $friendship = Friendship::where('user_id', $friend->friend_id)->where('friend_id', auth()->user()->id)->first();
        if ($friendship) $friendship->delete();

        $friend->delete();

        return redirect()->route('friend');
    }
}
