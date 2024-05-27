@extends('frontend.layouts.main')
@section('content')
    <!-- Cart Page Start -->
    <div class="container-fluid py-2">

        <div class="container ">
            <h4 class="text-primary mb-3 fs-2">Cart Lists</h4>
            <div id="notification" class="alert" style="display:none;"></div>
            <form id="checkoutForm" action="{{ route('checkout') }}" method="GET">
                @csrf

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Select Items</th>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Cancel</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            @php
                                $total = 0;
                            @endphp

                            @foreach ($carts as $cartItem)
                                @php
                                    $itemTotal = $cartItem->product->product_price * $cartItem->quantity;
                                    $total += $itemTotal;
                                @endphp

                                <tr data-cart-id="{{ $cartItem->id }}"
                                    data-stock="{{ $cartItem->product->product_quantity }}">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $cartItem->id }}"
                                                name="selectedItems[]" id="checkbox{{ $cartItem->id }}" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($cartItem->product->product_image) }}"
                                                class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cartItem->product->product_name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">NPR {{ $cartItem->product->product_price }}</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button type="button"
                                                    class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0"
                                                value="{{ $cartItem->quantity }}">
                                            <div class="input-group-btn">
                                                <button type="button"
                                                    class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 total-price">NPR
                                            {{ $cartItem->product->product_price * $cartItem->quantity }}</p>
                                    </td>
                                    <td>
                                        <button type="button" onclick="deleteCartItem('{{ $cartItem->id }}')"
                                            class="btn btn-md rounded-circle bg-light border mt-4 btn-delete">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" onclick="proceedToCheckout()"
                        class="btn border-secondary rounded px-4 py-3 text-primary text-uppercase mb-4 ms-4">
                        Proceed Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function deleteCartItem(cartItemId) {
            if (confirm("Are you sure you want to delete this item?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "/delete-cart/" + cartItemId, true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'));
                xhr.setRequestHeader("X-HTTP-Method-Override", "DELETE");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            window.location.reload();
                        }
                    }
                };

                xhr.send();
            }
        }

        function proceedToCheckout() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length === 0) {
                alert('Please select at least one item to proceed to checkout.');
                return;
            }

            let isValid = true;

            checkboxes.forEach((checkbox) => {
                const cartRow = checkbox.closest('tr');
                const quantityInput = cartRow.querySelector('input[type="text"]');
                const quantity = parseInt(quantityInput.value);
                const stock = parseInt(cartRow.getAttribute('data-stock'));

                if (quantity > stock) {
                    isValid = false;
                    alert(
                        `The quantity of ${cartRow.querySelector('td:nth-child(3) p').innerText} exceeds available stock.`
                    );
                }

                if (quantity === 0) {
                    isValid = false;
                    alert(
                        `The quantity of ${cartRow.querySelector('td:nth-child(3) p').innerText} is zero. Please update the quantity to proceed.`
                    );
                }
            });

            if (isValid) {
                document.getElementById('checkoutForm').submit();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const cartItemsContainer = document.getElementById('cart-items');
            const notification = document.getElementById('notification');

            const showNotification = (message, type) => {
                notification.className = `alert alert-${type}`;
                notification.innerText = message;
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            };

            const updateCartTotal = (cartRow) => {
                const quantityInput = cartRow.querySelector('input[type="text"]');
                const price = parseFloat(cartRow.querySelector('td:nth-child(4) p').innerText.replace('NPR ',
                    ''));
                const totalPriceElement = cartRow.querySelector('.total-price');
                const newTotal = price * parseInt(quantityInput.value);
                totalPriceElement.innerText = `NPR ${newTotal}`;
            };

            const updateCartQuantity = (cartId, quantity) => {
                const tokenElement = document.querySelector('meta[name="csrf-token"]');
                const token = tokenElement ? tokenElement.getAttribute('content') : '';

                if (!token) {
                    console.error('CSRF token not found.');
                    return;
                }

                fetch(`{{ route('update_cart') }}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            id: cartId,
                            quantity
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            showNotification('Cart updated successfully', 'success');
                        } else {
                            showNotification(data.message, 'danger');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        showNotification(error.message, 'danger');
                    });
            };

            cartItemsContainer.addEventListener('click', function(event) {
                const button = event.target.closest('.btn-minus, .btn-plus');
                if (button) {
                    event.stopPropagation();
                    const cartRow = button.closest('tr');
                    const quantityInput = cartRow.querySelector('input[type="text"]');
                    let quantity = parseInt(quantityInput.value);
                    const stock = parseInt(cartRow.getAttribute('data-stock'));

                    if (button.classList.contains('btn-minus')) {
                        if (quantity > 1) {
                            quantity--;
                        }
                    } else if (button.classList.contains('btn-plus')) {
                        if (quantity < stock) {
                            quantity++;
                        } else {
                            alert(
                                `The quantity of ${cartRow.querySelector('td:nth-child(3) p').innerText} cannot exceed available stock.`
                            );
                        }
                    }

                    quantityInput.value = quantity;
                    updateCartTotal(cartRow);

                    const cartId = cartRow.getAttribute('data-cart-id');
                    updateCartQuantity(cartId, quantity);

                    const minusButton = cartRow.querySelector('.btn-minus');
                    minusButton.disabled = quantity === 1;

                    const plusButton = cartRow.querySelector('.btn-plus');
                    plusButton.disabled = quantity >= stock;
                }
            });
        });
    </script>
@endsection
