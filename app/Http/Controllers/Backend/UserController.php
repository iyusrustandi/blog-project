<?php

//app/Http/Controllers/Backend/UserController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5); 
        return view('backend.users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::with('roles') // Sesuaikan dengan relasi yang ada, misal 'roles'
            ->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhereHas('roles', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            }) // Sesuaikan dengan kolom yang ada pada relasi roles
            ->paginate(5);

        // Menambahkan query pencarian ke pagination links
        $users->appends(['query' => $query]);

        return view('backend.users.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', //max image upload size
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;

    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile_pictures', $filename);
        $user->profile_picture = $filename;
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    if ($request->has('remove_profile_picture')) {
        if ($user->profile_picture) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
            $user->profile_picture = null;
        }
    } elseif ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile_pictures', $filename);
        $user->profile_picture = $filename;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    /**
     * Update the specified user role in storage.
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,author,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    }


   public function removeProfilePicture(User $user)
{
    if ($user->profile_picture) {
        Storage::delete('public/profile_pictures/' . $user->profile_picture);
        $user->profile_picture = null;
        $user->save();
    }

    return redirect()->back()->with('success', 'Profile picture removed successfully.');
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
