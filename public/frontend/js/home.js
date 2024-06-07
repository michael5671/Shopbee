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
