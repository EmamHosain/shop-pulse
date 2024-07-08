import { router } from "@inertiajs/vue3"
export default function useProduct() {

    const addToCart = (id, goToCartPage = null) => {
        router.post(route('checkout.store'), { productId: id }, {
            preserveScroll: true,
            replace: true,
            preserveState: true,
            onSuccess: () => {
                if (goToCartPage !== null) {
                    router.get(route('page.checkout'), '',)
                }
            },
            onError: (errors) => {
                console.log('errors', errors)
            }
        })
    }
    const addToWishList = (id) => {
        router.post(route('wishlist.store'), {
            productId: id
        }, {
            preserveScroll: true,
            preserveState: true,
            replace: true,
            onSuccess: () => {
                console.log('add to wishlist successfully')
                // console.log('products', products.value)
            }
        })
    }

    const productBuyNow = (id) => {
        addToCart(id, true);
    }




    const getProductsByCategory = (slug) => {

        const scrollToElement = (id) => {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }

        router.visit(route('page.productsByCategory'), {
            method: 'get',
            data: { category: slug }, // Query parameter
            onSuccess: () => {
                // Scroll to the specific element after navigation
                scrollToElement('sortingProduct');
            },
            preserveScroll: true // Optional: to keep current scroll position on the page
        });
    }



    return { addToCart, addToWishList, productBuyNow, getProductsByCategory }
}