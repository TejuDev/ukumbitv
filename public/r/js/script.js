/**
 * Created by admin on 15.08.2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


/***********slider*************/
// $('.list-horizontal-wrapper').slick({
//     dots: false,
//     infinite: false,
//     speed: 300,
//     slidesToShow: 5,
//     slidesToScroll: 1,
//     responsive: [
//         {
//             breakpoint: 992,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1
//             }
//         },
//         {
//             breakpoint: 768,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1
//             }
//         },
//         {
//             breakpoint: 480,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1
//             }
//         }
//     ]
// });
/*********series**slider*************/
// $('.series-list-slider').slick({
//     dots: false,
//     infinite: false,
//     speed: 300,
//     slidesToShow: 12,
//     slidesToScroll: 12,
//     responsive: [
//         {
//             breakpoint: 992,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1
//             }
//         },
//         {
//             breakpoint: 768,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1
//             }
//         },
//         {
//             breakpoint: 480,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1
//             }
//         }
//     ]
// });
/*********video**popup*************/
// if ($(window).width() > 1199) {
//     $(".cb-video").colorbox({iframe: true, width: '90%', height: '80%'});
// } else if ($(window).width() > 991) {
//     $(".cb-video").colorbox({iframe: true, width: '90%', height: '70%'});

// } else if ($(window).width() > 767) {
//     $(".cb-video").colorbox({iframe: true, width: '90%', height: '55%'});


// } else if ($(window).width() > 575) {
//     $(".cb-video").colorbox({iframe: true, width: '90%', height: '45%'});
// } else {
//     $(".cb-video").colorbox({iframe: true, width: '100%', height: '40%'});
// }

$("#payinfo").click(function () {
    $('.payment-content-block').slideToggle(500);
    $(this).toggleClass("open");
    return false;
})
/**************change**password**button*********/
$("#change-pas").click(function () {
    $('.change-pas-block').slideToggle(300)
        .toggleClass("open");
    $(this).toggleClass("open");

})
/**************search****button*********/
$("#butn-search").click(function () {
    if (window.innerWidth < 767) {
        if ($(".search-wrap").hasClass('open') && $(".search-wrap").find('input').val()) {
        } else {
            $(".search-wrap").toggleClass("open");
            $(".login-block").toggleClass("open");
            return false;
        }
    }
});
/**************show**password**button*********/
$(".mypass").passField({/*options*/});
/**************menu**mobile**button*********/
$(document).on("click", ".butn-menu", function () {
    $('.menu-block').slideToggle();
    $(this).toggleClass("open");
    $('.menu-block').toggleClass('open');
})
/************aside**menu***********/
var VideoFilter = (function () {
    $container = $('.menu-container');
    $($container).css('height', $($container).height() + 'px');
    $toggler = $($container).find('.show-on-hover');
    $itemsContainer = $($container).find('.menu-items');
    $items = $($container).find('.menu-items>li');
    $current = false;
    $currentActive = false;
    $resultsContainer = $('.js-filter-results');

    var hideElements = function () {
        $container.find('.menu-items>li').not($current).css('width', 0);
    };

    var showElements = function () {
        $container.find('.menu-items>li').not($current).css('width', '170px');
    };

    var slideDownElements = function () {
        $container.find('.menu-items>li').not($current).stop().animate({width: 0}, 500, function () {

        });
    };

    var slideUpElements = function () {

        $container.find('.menu-items>li').not($current).stop().animate({width: $container.width()}, 500, function () {
        });
    };

    var showSubmenu = function () {
        $subMenu = $current.find('.sub-menu');
        if ($subMenu.length < 1) {
            return false
        }
        $subMenu = $subMenu[0];
        $($subMenu).slideDown();
    };

    var changeActive = function () {

        if ($current.find('.sub-menu').length > 0) {
            hideElements();
            $current.css({'position': 'absolute', top: $current.position().top}).animate({top: 0}, 500, function () {
                $(this).addClass('active').removeAttr('style');
                $currentActive.removeClass('active');
                showSubmenu();
            });

        } else {
            hideElements();
            var $activeClone = $currentActive.clone().removeClass('active');
            var offset_top = $current.position().top;

            $currentActive.stop().animate({top: offset_top}, 500, function () {
                $(this).remove();
                var $before_elem = $current.next();
                if (!$before_elem.length) {
                    $($activeClone).insertAfter($current.prev());
                } else {
                    $($activeClone).insertBefore($before_elem);
                }
                showElements();
            });

            $current.css({'position': 'absolute', top: $current.position().top}).animate({top: 0}, 500, function () {
                $(this).addClass('active').removeAttr('style');
            });
        }

    };

    var loadFilteredResults = function () {
        var href = $current.find('> a').attr('href');
        $.get(href, function (data) {
            $resultsContainer.html(data);
        })
    };

    $(document).on('click', '.menu-items>li', function () {
        if ($(this).hasClass('active')) {
            return false;
        }

        if ($($container).find(':animated').length > 0) {
            return false
        }

        $('.sub-menu:visible').css('display', 'none');
        $currentActive = $($itemsContainer).find('.active');
        $current = $(this);

        loadFilteredResults();
        changeActive();
        return false;
    });


    $(document).on('mouseenter', '.show-on-hover', function () {
        if ($($container).find(':animated').length > 0) {
            return false
        }
        slideUpElements();
    }).on('mouseleave', '.menu-container', function () {
        if ($($container).find(':animated').length > 0) {
            return false
        }
        if ($('.active').find('.sub-menu').length > 0) {
            slideDownElements();
        }
    });
})();

// var VideoInfoPopup = (function () {
//     var container = '.list-horizontal-wrapper';
//     var element = '.video-item';

//     var popup = '.video-item-popup';
//     var $popup = $('.video-item-popup');
//     var $currentElement = false;

//     var setPopupContent = function ($elem) {
//         $popup.find('.video-title').text($elem.find('.video-title').text());
//         $popup.find('.likes-count').text($elem.find('.likes-count').text());
//     };

//     var show = function () {
//         $popup.css('display', 'block');
//     };

//     var hide = function () {
//         $popup.css('display', 'none');
//     };

//     var setPosition = function () {
//         var $container = $currentElement.closest(container);
//         var elementWidth = $currentElement.width();
//         var containerOffset = $container.offset();
//         var currentElementOffset = $currentElement.offset();
//         var containerRightEnd = containerOffset.left + $container.width();

//         var left = (currentElementOffset.left + elementWidth/2)-$popup.width()/2;
//         var top = currentElementOffset.top-50;
//         if(containerOffset.left > left){
//             left = containerOffset.left;
//         }
//         if(containerRightEnd<left+$popup.width()){
//             left = containerRightEnd-$popup.width();
//         }
//         $popup.css({'left':left,'top':top});
//     };


//     $(document).on('mouseenter', container + ' ' + element, function () {
//         setPopupContent($(this));
//         $currentElement = $(this);
//         setPosition();
//         show();
//     }).on('mouseleave', container + ' ' + element + ', ' + popup, function () {
//         if (!$popup.is(':hover') && !$currentElement.is(':hover')) {
//             hide();
//         }
//     });


// })();//VideoInfoPopup




// console.log('>>>>', $('#GP-menu').length);

//Stick "GP-menu"
$(document).ready(function(){ 
  $('#GP-menu').sticky({topSpacing:0});


 	$('body').on('click', '#btn-comment-rate-modal', function(){
 		console.log('heyeyey');
 		// $('#comment-rate-modal').modal();
 	});
  
});




//Submit comment on click
//------------------------
$('body').on('click', '#btn-submitcomment', function(){
	console.log('***heyeyey');
	comment_submit($(this).data('comment-route'));
});


//Add/remove like on click
//------------------------
$('body').on('click','.btn-like', function(){
	if(!$(this).hasClass('btn-on')){
		movie_like($(this));
	}else{
		movie_unlike($(this));
	}
});

//Add/remove like on click
//------------------------
$('body').on('click','.btn-dislike', function(){
	if(!$(this).hasClass('btn-on')){
		movie_dislike($(this));
	}else{
		movie_undislike($(this));
	}
});



function comment_submit(urlCommentRoute){
	if($('#comment-text').val() === '') {
    swal("Hmm", "Need to write a review, try again pls", "error");
	} else {

    var token = $('meta[name="csrf-token"]').attr('content');
    var fd = new FormData;

    fd.append('_token', token);
    fd.append('video_id', '{{$video->id}}');
    fd.append('text', $('#comment-text').val());

    $.ajax({
        type: 'POST',
        url: urlCommentRoute,
        contentType: false,
        processData: false,
        data: fd,
        dataType: 'html',
        success: function(data){
            var rep = JSON.parse(data);
            //alert('Comment successful send!');
            //console.log(rep);
            $('#comment-text').val('');
            $("#new-comment-section").append('<div class="comment"><div class="img-block"><img src="{{Auth::user()->picture}}" alt=""></div><div class="comment-text-block"><div class="comment-name">{{Auth::user()->name}}</div><p class="comment-text">'+rep.text+'</p></div></div>');
        },
        error: function (data) {
            alert('error '+data);
        }
    }); 
	}//end else
}

function movie_like($btn) { 
  var likesCount = $('#likes-count').text();
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;
		//...
  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', '{{$video->id}}');
  fd.append('type', 'like');


  console.log('>>>>>"', $btn.data('route-like'));

  $.ajax({
    type: 'POST',
    url: $btn.data('route-like'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#likes-count, #likes-count-top').text(+likesCount + 1);
      //...
      $('.btn-like').removeClass('btn-off').addClass('btn-on');
      $('.btn-dislike').removeClass('.btn-on').addClass('btn-off');

      var rep = JSON.parse(data);

      if(rep.check === 1){
          $('#dislikes-count').text(+disLikesCount - 1);
      } 
    },
    error: function(data){
        swal("Hmm", "Something went wrong, try again pls", "error");
  	}
  });
}//like

function movie_unlike($btn) { 
  var likesCount = $('#likes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', '{{$video->id}}');

  $.ajax({
    type: 'POST',
    url: $btn.data('route-unlike'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#likes-count, #likes-count-top').text(+likesCount - 1);
      //...
      $('.btn-like').removeClass('btn-on').addClass('btn-off');
      // $('.btn-dislike').removeClass('.btn-off').addClass('btn-on');

      var rep = JSON.parse(data); 
    },
    error: function(data){
      swal("Hmm", "Something went wrong, try again pls", "error");
    }
  });
}//unlike

function movie_dislike($btn) { 
  var likesCount = $('#likes-count').text();
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', '{{$video->id}}');
  fd.append('type', 'dislike');

  $.ajax({
    type: 'POST',
    url: $btn.data('route-like'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#dislikes-count').text(+disLikesCount + 1);
      //...
      $('.btn-dislike').removeClass('btn-off').addClass('btn-on');
      $('.btn-like').removeClass('btn-on').addClass('btn-off');
      var rep = JSON.parse(data);
      if(rep.check === 1){
          $('#likes-count, #likes-count-top').text(+likesCount - 1);
      } 
    },
    error: function(data){
        swal("Hmm", "Something went wrong, try again pls", "error");
    }
  });
}//dislike

function movie_undislike($btn) { 
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', '{{$video->id}}'); 

  $.ajax({
    type: 'POST',
    url: $btn.data('route-unlike'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#dislikes-count').text(+disLikesCount - 1);
      $('.btn-dislike').removeClass('btn-on').addClass('btn-off');
      var rep = JSON.parse(data); 
    },
    error: function(data){
      swal("Hmm", "Something went wrong, try again pls", "error");
    }
  });
}//undislike







/**
 *
 * SEARCH AUTOCOMPLETE
 * --------------------
*/

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];

$('#frame-search .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});


/*
1)THERE IS A PROBLEM WHEN TRYING TO IMPLEMENT THE REMOTE VERSION:
2)IT LOOKS LIKE THE END POINT YOU CREATED DOESN'T MATCH THEIR SYSTEM
--- please check it out ---
//http://twitter.github.io/typeahead.js/examples/#remote



var db_keywords = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  // url points to a json file that contains an array of country names, see
  // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
  prefetch: '',//<-- this needs to point to a local json file of values
  remote: {
    url: $('body').data('search-route'),//<!-- route is on the body tag
    // wildcard: '%QUERY'
  }
});

// passing in `null` for the `options` arguments will result in the default
// options being used
$('#frame-search .typeahead').typeahead(null, {
  name: 'search-keywords',
  display: 'value',
  source: db_keywords
});
*/

/**
//PREVIOUS SEARCH SCRIPT THAT ALEX HAS DONE!
// var searchData;
        // var searchList = '';

        // $( '.search-list' ).click(function(event) {
        //     $( '#search-input' ).val(event.target.text);
        //     $('.search-list-block').css('display', 'none');

        //     console.log(event.target.text);
        // });
        // $( '#search-input' ).focus(function() {
        //     $('.search-list-block').css('display', 'block');
        // });
        // $('#search-input').focusout(function(){
        //     setTimeout(function(){ $('.search-list-block').css('display', 'none'); }, 300);
        // });

 

        // function getSearchData() {
        //     $.ajax({
        //         type: 'POST',
        //         url: '{{route('search-data')}}',
        //         contentType: false,
        //         processData: false,
        //         data: {},
        //         dataType: 'html',
        //         success: function(data){
        //             var rep = JSON.parse(data);

        //             searchData = rep;

        //             rep.forEach(function(item, i, rep) {
        //                 searchList = searchList+'<li><a href="#">'+item.word+'</a></li>';
        //             });

        //             $(".search-list").html(searchList);


        //         },
        //         error: function(data){
        //             console.log('error ' + data);
        //         }
        //     });
        // }

        // $(function(){
        //     $("#search-input").keyup(function(){
        //         var search = $("#search-input").val();


        //         var positiveArr = searchData.filter(function(word) {
        //             if(word.word.toLowerCase().indexOf(search.toLowerCase()) === -1){
        //                 return false
        //             } else {
        //                 return true;
        //             }

        //         });
        //         var newSearchList = '';
        //         positiveArr.forEach(function(item, i, positiveArr) {
        //             newSearchList = newSearchList+'<li><a href="#">'+item.word+'</a></li>';
        //         });

        //         $(".search-list").html(newSearchList);
        //         return false;
        //     });
        // });
*/







