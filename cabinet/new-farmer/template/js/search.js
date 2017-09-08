/**
 * Created by admin on 06.09.2017.
 */
(function( $ ){
    $.fn.jSearch = function( options ) {

        var defaults = {
            selector: null,
            child: null,
            minValLength: 3,
            Found: function(elem, event){},
            NotFound: function(elem, event){},
            Before: function(t){},
            After: function(t){},
        };

        var options = $.extend(defaults, options);
        var $this = $(this);

        if ( options.selector == null || options.child === null || typeof options.NotFound != "function" || typeof options.Found != "function" || typeof options.After != "function" || typeof options.Before != "function" )
        { console.error( 'One of the parameters is incorrect.' ); return false; }


        $this.on( 'keyup', function(event){

            options.Before($this);

            if ( $(this).val().length >= options.minValLength ) {
                console.clear();

                $( options.selector ).find( options.child ).each(function( event ){
                    if ( this.innerText.toLowerCase().indexOf( $this.val().toLowerCase() ) == -1 ) {
                        options.NotFound( this, event );
                    } else {
                        options.Found( this, event );
                    }

                });

            }

            options.After($this);

        });

    };
})( jQuery );