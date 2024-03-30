document.addEventListener('DOMContentLoaded', function() {
    var productDetailsLinks = document.querySelectorAll('.product-details-link');
    productDetailsLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            var productId = link.getAttribute('data-product-id');
            loadProductDetails(productId);
        });
    });

    function loadProductDetails(productId) {
        var productDetailsContainer = document.querySelector('#productDetailsModal .modal-body');
        var productDetailsHtml = document.querySelector('#product-details-' + productId);
        
        if (productDetailsContainer && productDetailsHtml) {
            productDetailsContainer.innerHTML = productDetailsHtml.innerHTML;
            document.getElementById('productDetailsModal').classList.add('show');
        } else {
            console.error('Product details container or HTML not found.');
        }
    }
});
