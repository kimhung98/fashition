<?php

namespace Core\Services;

use Core\Repositories\Contract\CartRepositoryContract;
use Core\Repositories\Contract\ProductRepositoryContract;
use Core\Services\Contract\CartServiceContract;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService implements CartServiceContract
{
    protected $repository;
    protected $product;

    public function __construct(CartRepositoryContract $repository, ProductRepositoryContract $product)
    {
        $this->repository = $repository;
        $this->product = $product;
    }

    public function addCart($id, $data)
    {
        $product = $this->product->find($id);
        $price = $product->price - $product->price_sale;
        $image = explode(',', $product->images);
        $image = $image[0];
        Cart::add($id, $product->name, $data['qty'], $price, 0, ['image' => $image, 'size' => $data['size'], 'color' => $data['color']]);
    }

    public function destroy($id)
    {
        Cart::remove($id);
    }

    public function checkout($data)
    {
        $customer = $this->repository->addCustomer($data);
        $order_data = [
            'customer_id' => $customer->id,
            'total' => Cart::Subtotal($decimals = 0),
            'status' => 1,
        ];

        $order = $this->repository->addOrder($order_data);

        foreach (Cart::content() as $item) {
            $note = 'size: ' . $item->options->size;
            $order_details = [
                'order_id' => $order->id,
                'product_id' => $item->id,
                'size' => $item->options->size,
                'color' => $item->options->color,
                'quantity' => $item->qty,
            ];
            $this->repository->addOrderDetails($order_details);
        }
        $data = [
            'name' => $customer->name,
            'total' => $order->total,
            'content' => Cart::content(),
        ];

        Cart::destroy();
        return true;
    }

    public function update($data)
    {
        foreach ($data['data'] as $item) {
            Cart::update($item['rowId'], $item['item']);
        }
        return back();
    }
}
