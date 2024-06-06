/*=============== SHOW SEARCH ===============*/
let dropdown = document.getElementById('dropdown');
let search = document.querySelector('.header .nav .search_box_hide');
document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   dropdown.classList.remove('show');
}

/*=============== SHOW CART ===============*/
   document.addEventListener('DOMContentLoaded', function () {
      const cartIcon = document.getElementById('cart-btn');
      const dropdown = document.getElementById('dropdown');
      const summary = document.querySelector('.summary p');

      const toggleDropdown = (show) => {
         dropdown.classList.toggle('show', show);
         search.classList.remove('active');
      };

      cartIcon.addEventListener('mouseenter', () => toggleDropdown(true));
      cartIcon.addEventListener('mouseleave', () => toggleDropdown(false));
      dropdown.addEventListener('mouseenter', () => toggleDropdown(true));
      dropdown.addEventListener('mouseleave', () => toggleDropdown(false));

      const updateTotalProducts = () => {
         const totalProducts = document.querySelectorAll('.cart-item').length;
         const productText = totalProducts >= 2 ? 'products' : 'product';
         summary.innerHTML = `Total ${totalProducts} ${productText}`;
      };

      document.querySelectorAll('.bxs-trash-alt').forEach(button => {
         button.addEventListener('click', (event) => {
               const cartItem = event.target.closest('.cart-item');
               if (cartItem) {
                  cartItem.classList.add('fade-out');
                  setTimeout(() => {
                     cartItem.remove();
                     updateTotalProducts();
                  }, 300);
               }
         });
      });

      updateTotalProducts();
   });
/*=================SHOW PROFILE==================*/
document.addEventListener('DOMContentLoaded', function () {
    const userIcon = document.getElementById('user-btn');
    const profile = document.getElementById('profile');
    const toggleDropdown = (show) => {
        profile.classList.toggle('show', show);
        search.classList.remove('active');
        dropdown.classList.remove('show');
    };

    userIcon.addEventListener('mouseenter', () => toggleDropdown(true));
    userIcon.addEventListener('mouseleave', () => toggleDropdown(false));
    profile.addEventListener('mouseenter', () => toggleDropdown(true));
    profile.addEventListener('mouseleave', () => toggleDropdown(false));
});
/*=============== SHOW SCROLL UP ===============*/
let body = document.body;
function scrollUp(){
   const scrollUp = document.getElementById('scroll-up');
   if(this.scrollY >= 460) scrollUp.classList.add('show-scroll');
   else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp);

/*====================================================================================================================*/

/*================================================== TABS -======================================*/
if($('.tab-wrap')[0] ){
    $('.tab-wrap' )
        .on('click', '.tab-nav .item', switchTab )
        .find( '.tab-nav .item:first-child' ).trigger( 'click' );

    function switchTab( event ){
        var curentTab = $( this ),
            tabWrapper = $( event.delegateTarget ),
            visibleContent = $( '.' + curentTab.attr('rel') ),
            contentHeight;

        $( '.active', tabWrapper ).removeClass( 'active' );
        curentTab.addClass( 'active' );

        $( '.visible-content', tabWrapper ).removeClass( 'visible-content' );
        visibleContent.addClass( 'visible-content' );

        contentHeight = visibleContent.height();
        $( '.tabs-content', tabWrapper ).height( contentHeight );
    }

    $( window ).on( 'resize.myTemplate' , resizeTab );

    function resizeTab( event ){
        var visibleContent = $( '.tab.visible-content' );
        setTimeout(function(){
            visibleContent.each( function() {
                var contentHeight = $( this ).outerHeight(true),
                    tabsContent = $( this ).parents( '.tabs-content' );

                tabsContent.height( contentHeight );
            } );
        }, 700);
    }
}
