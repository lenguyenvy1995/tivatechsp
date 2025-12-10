@if (! EcommerceHelper::hideProductPrice() || EcommerceHelper::isCartEnabled())

    {{-- Nếu giá bằng 0 ⇒ Hiển thị "Liên hệ" --}}
    @if ($product->price == 0)
        <span class="product-price">
            <span class="price-amount">
                <bdi>
                    <span class="amount">LIÊN HỆ</span>
                </bdi>
            </span>
        </span>

    @else
        {{-- Ngược lại hiển thị giá bình thường --}}
        <span class="product-price">
            <span class="product-price-sale bb-product-price @if (!$product->isOnSale()) d-none @endif">
                <ins>
                    <span class="price-amount">
                        <bdi>
                            <span class="amount bb-product-price-text" data-bb-value="product-price">
                                {{ format_price($product->front_sale_price_with_taxes) }}
                            </span>
                        </bdi>
                    </span>
                </ins>
                &nbsp;
                <del aria-hidden="true">
                    <span class="price-amount">
                        <bdi>
                            <span class="amount bb-product-price-text-old" data-bb-value="product-original-price">
                                {{ format_price($product->price_with_taxes) }}
                            </span>
                        </bdi>
                    </span>
                </del>
            </span>

            <span class="product-price-original bb-product-price @if ($product->isOnSale()) d-none @endif">
                <span class="price-amount">
                    <bdi>
                        <span class="amount bb-product-price-text" data-bb-value="product-price">
                            {{ format_price($product->front_sale_price_with_taxes) }}
                        </span>
                    </bdi>
                </span>
            </span>
        </span>
    @endif
@endif