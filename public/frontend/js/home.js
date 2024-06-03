/*=============== SHOW SEARCH ===============*/ 
let dropdown = document.getElementById('dropdown');
let search = document.querySelector('.header .nav .search_box_hide');
document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   dropdown.classList.remmove('show');
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
var tabWrap = document.querySelector('.tab-wrap');
if (tabWrap) {
    tabWrap.addEventListener('click', function(event) {
        if (event.target.classList.contains('item')) {
            switchTab(event.target);
        }
    });

    var firstTabNavItem = tabWrap.querySelector('.tab-nav .item:first-child');
    firstTabNavItem.click();

    function switchTab(clickedTab) {
        var currentTab = clickedTab,
            tabWrapper = currentTab.closest('.tab-wrap'),
            rel = currentTab.getAttribute('rel'),
            visibleContent = tabWrapper.querySelector('.' + rel),
            contentHeight;

        tabWrapper.querySelectorAll('.tab-nav .item').forEach(function(item) {
            item.classList.remove('active');
        });
        currentTab.classList.add('active');

        tabWrapper.querySelectorAll('.visible-content').forEach(function(content) {
            content.classList.remove('visible-content');
        });
        visibleContent.classList.add('visible-content');

        contentHeight = visibleContent.offsetHeight;
        tabWrapper.querySelector('.tabs-content').style.height = contentHeight + 'px';
    }

    window.addEventListener('resize', resizeTab);

    function resizeTab() {
        var visibleContents = tabWrap.querySelectorAll('.tab.visible-content');
        setTimeout(function() {
            visibleContents.forEach(function(content) {
                var contentHeight = content.offsetHeight,
                    tabsContent = content.closest('.tabs-content');

                tabsContent.style.height = contentHeight + 'px';
            });
        }, 700);
    }
}
