<?php
$output = '';
$active = "active";
$show = "show active";
$checked = "checked";
$selected = "selected";
if (isset($properties)) {
    // dd($data["status_id"]);
    $output .='<div class="row">
        <div class="col-12 col-lg-12 col-md-12">
                        <p class="text-primary mb-1">Property ';  if($data["status_id"] == "1" ) {
                                                $output .="for Rent";
                                              }elseif ($data["status_id"] == "2") {
                                                $output .="for Sale";
                                              }else{}
                                              $output .='  in Dubai('. count($propCount) .')</p>
                        <h5 class="text-primary fw-semibold text-uppercase mb-3 mb-lg-5 mb-md-5">Search Result</h5>
                    </div>

                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="d-none d-lg-block d-md-block">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <ul class="nav nav-pills mb-3 viewTab" id="pills-tab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link ';
                                             if($data["tab"] === "list" ) {
                                                $output .=$active;
                                              }
                                             $output .=' viewBtn" id="listTab" data-bs-toggle="pill"
                                                data-bs-target="#listView" tabId="list" type="button" role="tab"
                                                aria-controls="listView" aria-selected="false">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-list-ul fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> List View</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link ';
                                             if($data["tab"] == "grid" ) { $output .=$active; }
                                             $output .='  viewBtn" id="gridTab" data-bs-toggle="pill"
                                                data-bs-target="#gridView" tabId="grid" type="button" role="tab"
                                                aria-controls="gridView" aria-selected="true">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-grid fIcon fa-stack-1x fa-inverse"></i>
                                                </span><span class="fs-14"> Grid View</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <div class="d-flex justify-content-end">
                                        <div class="my-auto pe-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input exclusiveSwitch" type="checkbox" role="switch"
                                                    id="exclusiveSwitch" name="exclusiveSwitch" value="'.$data["exclusive"].'" ';
                                                     if($data["exclusive"] == 1 ) {$output .=$checked;}
                                                     $output .='>
                                                <label class="form-check-label" for="exclusiveSwitch">Exclusive</label>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortBy rounded-1 pe-5"
                                                aria-label="" id="sortBy" name="sortBy">
                                                <option value="">Sort By</option>
                                                <option value="Newest" '; if($data["sort"] == "Newest" ) {$output .=$selected;} $output .='>Newest</option>
                                                <option value="Lowest"'; if($data["sort"] == "Lowest" ) {$output .=$selected;} $output .='>Price(Lowest)</option>
                                                <option value="Highest"'; if($data["sort"] == "Highest" ) {$output .=$selected;} $output .='>Price(Highest)</option>
                                                <option value="Least"'; if($data["sort"] == "Least" ) {$output .=$selected;} $output .='>Beds(Least)</option>
                                                <option value="Most"'; if($data["sort"] == "Most" ) {$output .=$selected;}
                                                $output .='>Beds(Most)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-block d-lg-none d-md-none">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input exclusiveSwitchMob" type="checkbox" role="switch"
                                                id="exclusiveSwitchMob" name="exclusiveSwitchMob" value="'.$data["exclusive"].'" ';
                                                 if($data["exclusive"] == 1 ) {$output .=$checked;}
                                                 $output .='>
                                            <label class="form-check-label" for="exclusiveSwitchMob">Exclusive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 my-auto">
                                    <div class="">
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortByMob rounded-1 pe-5"
                                                aria-label="" id="sortByMob">
                                                <option value="">Sort By</option>
                                                <option value="Newest" '; if($data["sort"] == "Newest" ) {$output .=$selected;} $output .='>Newest</option>
                                                <option value="Lowest"'; if($data["sort"] == "Lowest" ) {$output .=$selected;} $output .='>Price(Lowest)</option>
                                                <option value="Highest"'; if($data["sort"] == "Highest" ) {$output .=$selected;} $output .='>Price(Highest)</option>
                                                <option value="Least"'; if($data["sort"] == "Least" ) {$output .=$selected;} $output .='>Beds(Least)</option>
                                                <option value="Most"'; if($data["sort"] == "Most" ) {$output .=$selected;}
                                                $output .='>Beds(Most)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 my-auto">
                                    <ul class="nav nav-pills d-flex justify-content-end viewTab" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link ';
                                            if($data["tab"] == "list" ) {$output .=$active;}
                                            $output .=' viewBtn" tabId="list" id="listTab"
                                                data-bs-toggle="pill" data-bs-target="#listView" type="button"
                                                role="tab" aria-controls="listView" aria-selected="false">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-list-ul fIcon fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="py-3">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade ';
                                 if($data["tab"] == "grid" ) {$output .=$show;}
                                 $output .='" id="gridView" tabId="grid" role="tabpanel"
                                    aria-labelledby="gridTab" tabindex="0">';
                                    if (count($properties) > 0){
                                    $output .='    <div class="row g-4">';
                                            foreach($properties as $property){
                                                $bed = $property->bedrooms > 0 ? $property->bedrooms.' Bed' : 'Studio';
                                                // dd($bed);
                                                $bath =  $property->bathrooms > 0 ? $property->bathrooms : '';
                                                $area = $property->area > 0 ? $property->area : '';
                                                $currency = $property->currency ? $property->currency : 'AED';
                                            $output .='  <div class="col-12 col-lg-3 col-md-6">
                                                    <div>
                                                        <div class="card shadow propCard rounded-3 border-0">
                                                            <a href="'. url('property' . '/' . $property->slug) .'"
                                                                class="text-decoration-none">
                                                                <img src="'. $property->mainImage .'"
                                                                    class="card-img-top img-fluid propImg rounded-3 rounded-bottom-0"
                                                                    alt="'. $property->name .'">
                                                            </a>
                                                            <div class="card-body rounded-3 rounded-top-0">
                                                                <a href="'. url('property' . '/' . $property->slug) .'"
                                                                    class="text-decoration-none">
                                                                    <h6 class="text-primary fw-semibold mb-0">
                                                                        '. substr(strip_tags($property->name), 0, 30) . '...' .'
                                                                    </h6>
                                                                </a>
                                                                <ul class="list-unstyled propListSmall lh-1 mb-2">
                                                                    <li class="d-inline">
                                                                        <small>'. $bed .'
                                                                            </small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>'. $bath .'
                                                                            Bath</small>
                                                                    </li>
                                                                    <li class="d-inline">
                                                                        <small>'. $area .'
                                                                            SQ.FT</small>
                                                                    </li>
                                                                </ul>
                                                                <small
                                                                    class="fw-semibold">'. $currency .' '.
                                                                     number_format($property->price) .'</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }

                                            $output .='   <div class="col-12 col-lg-12">
                                                <nav aria-label="Page navigation example">
                                                    <div class="mobPagination justify-content-center">
                                                        '. $properties->withQueryString()->links() .'
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        '. $properties->withQueryString()->links() .'
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>';
                                    }else{
                                        $output .='  <div class="text-center">
                                            <p class="text-primary">No Property Found</p>
                                        </div>';
                                    }
                    $output .=' </div>
                                <div class="tab-pane fade  ';
                                 if($data["tab"] == "list" ) {$output .=$show;}
                                 $output .='" tabId="list" id="listView" role="tabpanel"
                                    aria-labelledby="listTab" tabindex="0">';
                                    if (count($properties) > 0){
                            $output .='<div class="row g-4">';
                                            foreach($properties as $row){
                                                $bed = $row->bedrooms > 0 ? $row->bedrooms.' Bed' : 'Studio';
                                                $bath =  $row->bathrooms > 0 ? $row->bathrooms : '';
                                                $area = $row->area > 0 ? $row->area : '';
                                                $currency = $row->currency ? $row->currency : 'AED';
                                                $address = $row->address ? substr(strip_tags($row->address), 0, 40) . '...' : $row->communities->name . ' - ' . $row->emirate;
                                            $output .=' <div class="col-12 col-lg-6 col-md-12 p-2">
                                                    <div>
                                                        <div class="card shadow rounded-3 propCard border-0">
                                                            <div class="row g-0">
                                                                <div class="col-md-5">
                                                                    <div class="swiper swiperPropList">
                                                                        <div class="swiper-wrapper">';
                                                                            if(count($row->subImages) > 0){
                                                                            foreach($row->subImages as $key => $imgs){
                                                                                if($key <3){
                                                                            $output .=' <div class="swiper-slide">
                                                                                    <div class="">
                                                                                        <center>
                                                                                            <a href="'. url('property' . '/' . $row->slug) .'"
                                                                                                class="text-decoration-none">
                                                                                                <img src="'. $imgs['path'] .'"
                                                                                                    class="img-fluid propImgListNew  rounded-end-0  rounded-3 "
                                                                                                    alt="'. $row->name .'">
                                                                                            </a>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>';
                                                                            }else{
                                                                                break;
                                                                            }
                                                                            }
                                                                        }else{
                                                                            $output .='<div class="swiper-slide">
                                                                            <div class="">
                                                                                <center>
                                                                                    <a href="'. url('property' . '/' . $row->slug) .'"
                                                                                        class="text-decoration-none">
                                                                                        <img src="'. $row->mainImage .'"
                                                                                            class="img-fluid propImgListNew  rounded-end-0 rounded-3 "
                                                                                            alt="'. $row->name .'">
                                                                                    </a>
                                                                                </center>
                                                                            </div>
                                                                        </div>';
                                                                        }

                                                                            $output .=' </div>
                                                                        <div class="swiper-button-prev">
                                                                            <span class="fa-stack fa-lg">
                                                                                <i
                                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                                <i
                                                                                    class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="swiper-button-next me-2">
                                                                            <span class="fa-stack fa-lg">
                                                                                <i
                                                                                    class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                                <i
                                                                                    class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                            </span>
                                                                        </div>';
                                                                        if($row->exclusive == 1){
                                                                        $output .=' <div
                                                                                class="badge bg-warning fw-normal text-white newBadge fs-12">
                                                                                Exclusive</div>';
                                                                         }
                                                                         $output .=' </div>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="p-relative h-100">
                                                                        <div class="card-body pb-5 pt-1">
                                                                            <small
                                                                                class="text-secondary">'. $row->accommodations->name .'</small>
                                                                            <a href="'. url('property' . '/' . $row->slug) .'"
                                                                                class="text-decoration-none">
                                                                                <h5 class="text-primary fw-semibold mb-0">
                                                                                    '. $currency .'
                                                                                    '. number_format($row->price) .'
                                                                                </h5>

                                                                                <small
                                                                                    class="text-black">'. substr(strip_tags($row->name), 0, 40) . '...' .'</small>
                                                                            </a>
                                                                            <div class=" mt-0 mt-md-5 mt-lg-5">
                                                                                <small><i
                                                                                        class="fa fa-map-marker"></i>&nbsp;
                                                                                        '. $address .'</small>
                                                                            </div>
                                                                            <ul
                                                                                class="list-unstyled propListSmall lh-1 my-2">
                                                                                <li class="d-inline"><small><i
                                                                                            class="fa fa-bed"
                                                                                            aria-hidden="true"></i>
                                                                                            '. $bed .'
                                                                                    </small></li>
                                                                                <li class="d-inline"><small><i
                                                                                            class="fa fa-bath"
                                                                                            aria-hidden="true"></i>
                                                                                            '. $bath .'
                                                                                        Bath</small>
                                                                                </li>
                                                                                <li class="d-inline"><small><i
                                                                                            class="bi bi-arrows-fullscreen"></i>
                                                                                            '. $area .'
                                                                                        SQ.FT</small></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="card-footer border-0  bg-white rounded-oneCorner rounded-0">
                                                                            <div class="d-flex justify-content-between">
                                                                                <div class="my-auto">
                                                                                    <ul class="list-unstyled  mb-0">
                                                                                        <li class="d-inline propOpt">
                                                                                            <a href="tel:'. $row->agent->contact_number .'"
                                                                                                class="text-decoration-none"
                                                                                                target="_blank">
                                                                                                <span class="fa-stack">
                                                                                                    <i
                                                                                                        class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                    <i
                                                                                                        class="bi bi-telephone fIconWhite fa-stack-1x fa-inverse"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="d-inline propOpt">
                                                                                            <a href="https://wa.me/'. $row->agent->whatsapp_number .'"
                                                                                                class="text-decoration-none"
                                                                                                target="_blank">
                                                                                                <span class="fa-stack">
                                                                                                    <i
                                                                                                        class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                    <i
                                                                                                        class="bi bi-whatsapp fIconGreen fa-stack-1x fa-inverse"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="d-inline propOpt">
                                                                                            <a href="mailto:'. $row->agent->email .'"
                                                                                                class="text-decoration-none"
                                                                                                target="_blank">
                                                                                                <span class="fa-stack">
                                                                                                    <i
                                                                                                        class="fa fa-circle-0  fa-stack-2x"></i>
                                                                                                    <i
                                                                                                        class="bi bi-envelope fIconWhite fa-stack-1x fa-inverse"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="my-auto">
                                                                                    <button type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#bookView"
                                                                                        propertyUrl="'. url('property' . '/' . $row->slug) .'"
                                                                                        class="btn btn-sm fs-12 btn-primary rounded-1 text-uppercase px-3 bookViewingBtn">Book
                                                                                        A Viewing</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                            $output .='<div class="col-12 col-lg-12">
                                                <nav aria-label="Page navigation example">
                                                    <div class="mobPagination justify-content-center">
                                                        '. $properties->withQueryString()->links() .'
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        '. $properties->withQueryString()->links() .'
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>';
                                    }else{
                                        $output .='<div class="text-center">
                                            <p class="text-primary">No Property Found</p>
                                        </div>';
                                    }
                                    $output .=' </div>
                            </div>
                        </div>
                    </div>
                </div>';
}

echo $output;
?>
