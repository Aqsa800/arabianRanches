@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Properties | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>{{ Request::is('rent') ? 'Rent' : (Request::is('resale') ? 'Resale' : 'Properties') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="agentSearch bg-white" id="singlePropertySearch">
                                <div class="pcAgentForm">
                                    <form action="" method="post" id="propSearchForm">
                                        @csrf
                                        <div class="row g-3 justify-content-center">
                                          <div class="col-md-6"> 
                                            <label for="required">'Single' tag mode</label>
			<select id="required" multiple="multiple" data-placeholder="Select attendees...">
			    <option>Steven White</option>
			    <option>Nancy King</option>
			    <option>Nancy Davolio</option>
			    <option>Robert Davolio</option>
			    <option>Michael Leverling</option>
			    <option>Andrew Callahan</option>
			    <option>Michael Suyama</option>
			    <option>Anne King</option>
			    <option>Laura Peacock</option>
			    <option>Robert Fuller</option>
			    <option>Janet White</option>
			    <option>Nancy Leverling</option>
			    <option>Robert Buchanan</option>
			    <option>Margaret Buchanan</option>
			    <option>Andrew Fuller</option>
			    <option>Anne Davolio</option>
			    <option>Andrew Suyama</option>
			    <option>Nige Buchanan</option>
			    <option>Laura Fuller</option>
			</select>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>
$(document).ready(function() {
            $("#required").kendoMultiSelect({
                autoClose: false,
                tagMode: "single",
            change: function() {
                var selectedValues = this.value();
                var currentTagMode = this.options.tagMode;
                var newTagMode = currentTagMode;
                if (selectedValues.length <= 2) {
                    newTagMode = "multiple";
                } else {
                    newTagMode = "single"
                }
                if (newTagMode != currentTagMode) {
                    this.value([])
                    this.setOptions({
                        tagMode: newTagMode
                    });
                    this.value(selectedValues);
                }
            }
            });

            $("#optional").kendoMultiSelect({
                autoClose: false
            });
        });
    $(document).on('click', '.bookViewingBtn', function() {
        //alert('check');
        var formName = $(this).attr("propertyUrl");
        $("#propName").val(formName);
    });
    $(".propertySelect").select2({
        tags: true,
        width: 'resolve',
        theme: "classic"
    })
    $(".propertySelect2").select2({
        tags: true,
        width: 'resolve',
        theme: "classic"
    })
</script>
<script>
    function fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
        sort, bathrooms, bedrooms, keywords, tabId) {
        if (window.location.pathname == "/rent") {
            var path = "rent";
        } else if (window.location.pathname == "/resale") {
            var path = "resale";
        } else {
            var path = "properties";
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/" + path + "?page=" + page,
            type: "POST",
            dataType: 'json',

            data: {
                page: page,
                status_id: status_id,
                accommodataion_id: accommodataion_id,
                price_from: price_from,
                price_to: price_to,
                exclusive: exclusive,
                sort: sort,
                bathrooms: bathrooms,
                bedrooms: bedrooms,
                keywords: keywords,
                tab: tabId
            },
            success: function(response) {

                $('.showPropList').html('');
                $('.showPropList').html(response.html);
                $("#btnPropSearch").prop("disabled", false);
                $("#btnPropSearchMob").prop("disabled", false);
                initSwiper();
                // $(".tab-content .tab-pane").removeClass("active");
                // $('.viewTab li .viewBtn').removeClass("active");
                // $('.viewTab li .viewBtn[tabId='"+tabId+"']').addClass("active");
                // $(".tab-content .tab-pane[tabId='"+tabId+"']").addClass("active");
                $('html, body').animate({
                    scrollTop: 400
                }, 'smooth');
            }
        })

    }
    $(document).on('change', '.sortBy', function(event) {
        var status_id = $('#status_id').val();
        var accommodataion_id = $('#accom_id').val();
        var price_from = $('#min-price').val();
        var price_to = $('#max-price').val();
        var exclusive = $('#exclusiveSwitch').val();
        var sort = $(this).val();
        var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_page').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.sortByMob', function(event) {
        var status_id = $('#status_idMob').val();
        var accommodataion_id = $('#accom_idMob').val();
        var price_from = $('#min-priceMob').val();
        var price_to = $('#max-priceMob').val();
        var exclusive = $('#exclusiveSwitchMob').val();
        var sort = $(this).val();
        var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_pageMob').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.exclusiveSwitch', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var status_id = $('#status_id').val();
        var accommodataion_id = $('#accom_id').val();
        var price_from = $('#min-price').val();
        var price_to = $('#max-price').val();
        var exclusive = $('#exclusiveSwitch').val();
        var sort = $('#sortBy').val();
        var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_page').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).on('change', '.exclusiveSwitchMob', function(event) {
        if (this.checked) {
            $(this).attr('value', 1);
            $(this).prop('checked', true);
        } else {
            $(this).attr('value', 0);
            $(this).prop('checked', false);
        }
        var status_id = $('#status_idMob').val();
        var accommodataion_id = $('#accom_idMob').val();
        var price_from = $('#min-priceMob').val();
        var price_to = $('#max-priceMob').val();
        var exclusive = $('#exclusiveSwitchMob').val();
        var sort = $('#sortByMob').val();
        var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
            .join();
        var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value).join();
        var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
        var page = $('#hidden_pageMob').val();
        var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
        // alert(tabId);
        fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
            sort, bathrooms, bedrooms, keywords, tabId);
    });
    $(document).ready(function() {

        $("#propSearchForm").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearch").prop("disabled", true);
            $('#hidden_page').val('1');
            var status_id = $('#status_id').val();
            var accommodataion_id = $('#accom_id').val();
            var price_from = $('#min-price').val();
            var price_to = $('#max-price').val();
            var exclusive = $('#exclusiveSwitch').val();
            var sort = $('#sortBy').val();
            var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var page = $('#hidden_page').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);
        });
        $("#propSearchFormMob").submit(function(e) {

            e.preventDefault();
            $("#btnPropSearchMob").prop("disabled", true);
            $('#hidden_pageMob').val('1');
            var status_id = $('#status_idMob').val();
            var accommodataion_id = $('#accom_idMob').val();
            var price_from = $('#min-priceMob').val();
            var price_to = $('#max-priceMob').val();
            var exclusive = $('#exclusiveSwitchMob').val();
            var sort = $('#sortByMob').val();
            var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var page = $('#hidden_pageMob').val();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            // alert(tabId);
            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);
        });
        $(document).on('click', '.mobPagination nav .pagination a', function(event) {

            event.preventDefault();
            var status_id = $('#status_idMob').val();
            var accommodataion_id = $('#accom_idMob').val();
            var price_from = $('#min-priceMob').val();
            var price_to = $('#max-priceMob').val();
            var exclusive = $('#exclusiveSwitchMob').val();
            var sort = $('#sortByMob').val();
            var bathrooms = $('input[name="bathroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedroomsMob"]:checked').toArray().map(item => item.value)
                .join();
            var keywords = $('#keywordsMob option:selected').toArray().map(item => item.value).join();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_pageMob').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);

        });
        $(document).on('click', '.pcPagination nav .pagination a', function(event) {

            event.preventDefault();
            var status_id = $('#status_id').val();
            var accommodataion_id = $('#accom_id').val();
            var price_from = $('#min-price').val();
            var price_to = $('#max-price').val();
            var exclusive = $('#exclusiveSwitch').val();
            var sort = $('#sortBy').val();
            var bathrooms = $('input[name="bathrooms"]:checked').toArray().map(item => item.value)
                .join();
            var bedrooms = $('input[name="bedrooms"]:checked').toArray().map(item => item.value).join();
            var keywords = $('#keywords option:selected').toArray().map(item => item.value).join();
            var tabId = $('.viewTab li .viewBtn.active').attr('tabId');
            var page = $(this).attr('href').split('page=')[1];

            $('#hidden_page').val(page);

            $('li').removeClass('active');

            $(this).parent().addClass('active');

            fetch_data(page, status_id, accommodataion_id, price_from, price_to, exclusive,
                sort, bathrooms, bedrooms, keywords, tabId);

        });


    });
</script>
@endsection
