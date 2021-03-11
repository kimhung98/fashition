<?php

namespace Core\Modules\Webview\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Webview\Requests\AddCartRequest;
use Core\Modules\Webview\Requests\CheckoutRequest;
use Core\Services\Contract\CartServiceContract;
use Core\Services\Contract\UserServiceContract;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart_service;
    protected $user_service;

    public function __construct(CartServiceContract $cart_service, UserServiceContract $user_service)
    {
        $this->cart_service = $cart_service;
        $this->user_service = $user_service;
    }

    public function index()
    {
        return view('Webview::page.shopping-cart');
    }

    public function create(AddCartRequest $request, $id)
    {
        $this->cart_service->addCart($id, $request->all());
        return redirect(route('pages.shopping-cart'));
    }

    public function update(Request $request)
    {
        $this->cart_service->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        $this->cart_service->destroy($id);
        return redirect(route('pages.shopping-cart'));
    }

    public function checkout($id) {
        $user = $this->user_service->find($id);
        return view('Webview::page.checkout', compact('user'));
    }

    public function addCheckout(Request $request)
    {
        $this->cart_service->checkout($request->all());
        return redirect(route('pages.index'))->with('notification', 'Bạn đã đặt mua hàng thành công');
    }
}
