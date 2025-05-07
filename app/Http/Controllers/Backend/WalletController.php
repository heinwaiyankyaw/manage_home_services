<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function walletList()
    {
        $wallets = Wallet::orderBy('updated_at', 'desc')->get();
        return view('backend.pages.wallets.index', compact('wallets'));
    }

    public function providerWalletList()
    {
        $wallets = Wallet::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('provider.pages.wallet.index', compact('wallets'));
    }

    public function walletView($id)
    {
        $wallet = Wallet::findOrFail($id);
        if (! $wallet) {
            return redirect()->route('admin.wallets.list')->with('error', 'Wallet Not Found');
        }
        return view('backend.pages.wallets.view', compact('wallet'));
    }

    public function providerWalletView($id)
    {
        $wallet = Wallet::findOrFail($id);
        if (! $wallet) {
            return redirect()->route('provider.wallets.list')->with('error', 'Wallet Not Found');
        }
        return view('provider.pages.wallet.view', compact('wallet'));

    }

    public function walletStatus($id)
    {
        $wallet = Wallet::findOrFail($id);
        if (! $wallet) {
            return redirect()->route('admin.wallets.list')->with('error', 'Wallet Not Found');
        }
        if ($wallet->status == 'active') {
            $wallet->status = 'inactive';
        } else {
            $wallet->status = 'active';
        }
        return redirect()->route('admin.wallets.list')->with('success', 'Wallet status was changed.');
    }

    public function providerWalletCreate()
    {
        return view('provider.pages.wallet.create');
    }

    public function providerWalletStore(Request $request)
    {
        $validatedData = $request->validate([
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name'     => 'required|string|max:255',
        ]);

        if ($request->hasFile('img_path')) {
            $imagePath = $request->file('img_path')->store('wallet_images', 'public');
        } else {
            return back()->with('error', 'Image upload failed.');
        }

        $wallet           = new Wallet();
        $wallet->user_id  = auth()->id(); // Get the logged-in user's ID
        $wallet->name     = $validatedData['name'];
        $wallet->img_path = $imagePath; // Save the image path
        $wallet->status   = 'active';   // Set status to active
        $wallet->save();
        return redirect()->route('provider.wallets.list')->with('success', 'Wallet created successfully.');
    }

    public function providerWalletUpdate(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
            'name'     => 'required|string|max:255',
            'status'   => 'nullable',
        ]);

        $wallet = Wallet::findOrFail($id);

        if ($request->hasFile('img_path')) {
            // Delete the old image if it exists
            if ($wallet->img_path && Storage::disk('public')->exists($wallet->img_path)) {
                Storage::disk('public')->delete($wallet->img_path);
            }

            // Store the new image
            $imagePath        = $request->file('img_path')->store('wallet_images', 'public');
            $wallet->img_path = $imagePath; // Update the image path
        }

        $wallet->name   = $validatedData['name'];
        $wallet->status = $validatedData['status'];
        $wallet->save();

        // Redirect with success message
        return redirect()->route('provider.wallets.list')->with('success', 'Wallet updated successfully.');
    }

    public function providerWalletDelete($id)
    {
        $data = Wallet::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Wallet was deleted.');
    }
}