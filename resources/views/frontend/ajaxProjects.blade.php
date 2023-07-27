<?php
$output = '';
$active = "active";
$show = "show active";
$checked = "checked";
$selected = "selected";

if (isset($projects)) {
    // dd($data["status_id"]);
    $output .='<div class="row">
        <div class="col-12 col-lg-12 col-md-12">
                        <div class="py-3 propTagDiv d-none d-lg-block d-md-block">
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTab" name="tags" id="all" autocomplete="off" value="all"';
                                if(isset($data['tag'])){
                                    if($data['tag'] == 'all'){
                                        $output .= 'checked' ;
                                    }
                                }
                                $output .='>
                                <label class="btn btn-primary btn-darkBlue" for="all">All</label>
                            </div>';
                            foreach ($tags as $key => $tag){
                            $output .=' <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTab" name="tags"
                                    id="tag'. $key + 1 .'" autocomplete="off" value="'. $tag->id .'"';
                                    if(isset($data['tag'])){
                                        if($data['tag'] == $tag->id){
                                            $output .= 'checked' ;
                                        }
                                     }
                               $output .='>
                                <label class="btn btn-primary btn-darkBlue"
                                    for="tag'. $key + 1 .'">'. $tag->name .'</label>
                            </div>';
                         }

                        $output .='  </div>
                        <div class="py-3 propTagDiv d-block d-md-none d-lg-none">
                            <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTabMob" name="tags" id="all" autocomplete="off" value="all"';
                                if(isset($data['tag'])){
                                    if($data['tag'] == 'all'){
                                        $output .= 'checked' ;
                                    }
                                }
                                $output .='>
                                <label class="btn btn-primary btn-darkBlue" for="all">All</label>
                            </div>';
                            foreach ($tags as $key => $tag){
                            $output .='  <div class="propTag">
                                <input type="radio" class="btn-check btnCheckTabMob" name="tagsMob"
                                    id="tagMob'. $key + 1 .'" autocomplete="off" value="'. $tag->id .'"';
                                    if(isset($data['tag'])){
                                        if($data['tag'] == $tag->id){
                                            $output .= 'checked' ;
                                        }
                                     }
                               $output .='>
                                <label class="btn btn-primary btn-darkBlue"
                                    for="tagMob'. $key + 1 .'">'. $tag->name .'</label>
                            </div>';
                        }

                        $output .='  </div>
                    </div>

                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="d-none d-lg-block d-md-block">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <ul class="nav nav-pills mb-3 viewTab" id="pills-tab" role="tablist">


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
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 my-auto">
                                    <div class="d-flex justify-content-end">
                                        <div class="my-auto pe-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input newSwitch" type="checkbox" role="switch"
                                                    id="newSwitch" name="newSwitch" value="'.$data["exclusive"].'" ';
                                                     if($data["exclusive"] == 1 ) {$output .=$checked;}
                                                     $output .='>
                                                <label class="form-check-label" for="newSwitch">New Launches</label>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortBy rounded-1 pe-5"
                                                aria-label="" id="sortBy" name="sortBy">
                                                <option value="">Sort By</option>
                                                <option value="Newest" '; if($data["sort"] == "Newest" ) {$output .=$selected;} $output .='>Newest</option>
                                                <option value="Lowest"'; if($data["sort"] == "Lowest" ) {$output .=$selected;} $output .='>Price(Lowest)</option>
                                                <option value="Highest"'; if($data["sort"] == "Highest" ) {$output .=$selected;} $output .='>Price(Highest)</option>
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
                                            <input class="form-check-input newSwitchMob" type="checkbox" role="switch"
                                                id="newSwitchMob" name="newSwitchMob" value="'.$data["exclusive"].'" ';
                                                 if($data["exclusive"] == 1 ) {$output .=$checked;}
                                                 $output .='>
                                            <label class="form-check-label" for="newSwitchMob">New Launches</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 my-auto">
                                    <div class="">
                                        <div class="my-auto">
                                            <select class="form-select  form-select-sm sortByMob rounded-1 pe-5"
                                                aria-label="" id="sortByMob">
                                                <option value="">Sort By</option>
                                                <option value="Newest" '; if($data["sort"] == "Newest" ) {$output .=$selected;} $output .='>Newest</option>
                                                <option value="Lowest"'; if($data["sort"] == "Lowest" ) {$output .=$selected;} $output .='>Price(Lowest)</option>
                                                <option value="Highest"'; if($data["sort"] == "Highest" ) {$output .=$selected;} $output .='>Price(Highest)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 my-auto">
                                    <ul class="nav nav-pills d-flex justify-content-end viewTab" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link ';
                                            if($data["tab"] == "grid" ) {$output .=$active;}
                                            $output .=' viewBtn" id="gridTab" data-bs-toggle="pill"
                                                data-bs-target="#gridView" tabId="grid" type="button" role="tab"
                                                aria-controls="gridView" aria-selected="true">
                                                <span class="fa-stack">
                                                    <i class="fa fa-circle-0  fa-stack-2x fCircle"></i>
                                                    <i class="bi bi-grid fIcon fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </button>
                                        </li>
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
                                    if (count($projects) > 0){
                                    $output .='    <div class="row g-4">';
                                            foreach($projects as $project){
                                            $output .=' <div class="col-12 col-lg-3 col-md-4">
                                            <div>
                                                <a href="'. url('dubai-offplan' . '/' . $project->slug) .'" class="text-decoration-none">
                                                    <div class="devContainer rounded-3"
                                                        style="background-image: url('. $project->mainImage .')">
                                                        <div class="devLogo p-3">
                                                            <div class="d-flex justify-content-between">

                                                                <div>
                                                                    <img src="'.$project->developer->logo.'"
                                                                        alt="'.$project->developer->names.'" class="img-fluid">
                                                                </div>
                                                                <div>';
                                                                    if($project->is_new_launch == 1){
                                                                        $output .='  <span
                                                                            class="badge bg-warning fw-normal text-white fs-12"><i
                                                                                class="bi bi-patch-check-fill"></i> New</span>';
                                                                    }
                                                                    $output .=' </div>
                                                            </div>

                                                        </div>
                                                        <div class="devDetails p-3">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="my-auto">
                                                                    <p class="mb-0 text-white">'.$project->title.'</p>
                                                                </div>

                                                                <div class="text-white border rounded-3 py-1 px-2 my-auto">
                                                                    <i class="bi bi-chevron-right"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>';
                                            }

                                            $output .='   <div class="col-12 col-lg-12">
                                                <nav aria-label="Page navigation example">
                                                    <div class="mobPagination justify-content-center">
                                                        '. $projects->withQueryString()->links() .'
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        '. $projects->withQueryString()->links() .'
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>';
                                    }else{
                                        $output .='  <div class="text-center">
                                            <p class="text-primary">No Project Found</p>
                                        </div>';
                                    }
                    $output .=' </div>
                                <div class="tab-pane fade  ';
                                 if($data["tab"] == "list" ) {$output .=$show;}
                                 $output .='" tabId="list" id="listView" role="tabpanel"
                                    aria-labelledby="listTab" tabindex="0">';
                                    if (count($projects) > 0){
                            $output .='<div class="row g-4">';
                                            foreach($projects as $row){
                                                $bed = $row->bedrooms ? $row->bedrooms : '';
                                                $areanum = $row->area ? $row->area.' ' : '';
                                                $areaSq= $row->area_unit ? $row->area_unit : 'sqft';
                                                $area = $areanum .  $areaSq;
                                                $tel =  $row->agent? $row->agent->contact_number ? $row->agent->contact_number : $telephone_number : $telephone_number;
                                                $email = $row->agent? $row->agent->email ? $row->agent->email : $email :  $email;
                                                $whatsapp = $row->agent? $row->agent->whatsapp_number ? 'https://wa.me/'.$row->agent->whatsapp_number : $whatsapp : $whatsapp;
                                            $output .=' <div class="col-12 col-lg-12 col-md-12">
                                                <div>
                                                <div class="card shadow rounded-3 propCard border-0">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <div class="swiper swiperPropList">
                                                                <div class="swiper-wrapper">';
                                                                    if (count($row->exteriorGallery) > 0){
                                                                    foreach ($row->exteriorGallery as $key => $imgs){
                                                                        if ($key < 3){
                                                                            $output .='  <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="'. url('dubai-offplan' . '/' . $row->slug) .'"
                                                                                            class="text-decoration-none">
                                                                                            <img src="'. $imgs['path'] .'"
                                                                                                class="img-fluid propImgList rounded-3  rounded-end-0"
                                                                                                alt="'. $row->title .'">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>';

                                                                        }else{
                                                                            break;
                                                                        }
                                                                    }
                                                                    }elseif(count($row->interiorGallery) > 0){
                                                                    foreach ($row->interiorGallery as $key => $imgs){
                                                                        if ($key < 3){
                                                                            $output .='  <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="'. url('dubai-offplan' . '/' . $row->slug) .'"
                                                                                            class="text-decoration-none">
                                                                                            <img src="'. $imgs['path'] .'"
                                                                                                class="img-fluid propImgList rounded-3  rounded-end-0"
                                                                                                alt="'. $row->title .'">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>';

                                                                        }else{
                                                                            break;
                                                                        }
                                                                        }
                                                                    }else{
                                                                        $output .='  <div class="swiper-slide">
                                                                                <div class="">
                                                                                    <center>
                                                                                        <a href="'. url('dubai-offplan' . '/' . $row->slug) .'"
                                                                                            class="text-decoration-none">
                                                                                            <img src="'. $row->mainImage .'"
                                                                                                class="img-fluid propImgList rounded-3  rounded-end-0"
                                                                                                alt="'. $row->title .'">
                                                                                        </a>
                                                                                    </center>
                                                                                </div>
                                                                            </div>';
                                                                 }

                                                                 $output .=' </div>
                                                                <div class="swiper-button-prev">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-left text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="swiper-button-next me-2">
                                                                    <span class="fa-stack fa-lg">
                                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                                        <i
                                                                            class="bi bi-chevron-right text-white mx-1 fs-14 fa-stack-1x"></i>
                                                                    </span>
                                                                </div>';
                                                                if($row->is_new_launch == 1){
                                                                $output .='<div
                                                                        class="badge bg-warning fw-normal text-white newBadge fs-12">
                                                                        <i class="bi bi-patch-check-fill"></i> New</div>';
                                                                 }
                                                                 $output .=' <div class="devTopLeft">
                                                                    <img src="'. $row->developer->logo .'"
                                                                        alt="'. $row->developer->name .'" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="p-relative h-100">
                                                                <div class="card-body pb-5 pt-3">';
                                                                    if($row->completion_date){
                                                                        $output .=' <span
                                                                        class="badge text-primary fw-normal bg-lightOlive fs-12">Delivery
                                                                        date '.$row->completion_date.'</span>';
                                                                     }
                                                                     $output .='  <a href="'. url('dubai-offplan' . '/' . $row->slug) .'" class="text-decoration-none">
                                                                        <h5 class="text-primary fw-semibold mt-1 mb-0">'.$row->title.'
                                                                        </h5>
                                                                    </a>
                                                                    <small>Starting Price : AED '.$row->starting_price.'</small>
                                                                    <ul class="list-unstyled">
                                                                        <li class=""><small>Bed : '.$bed.'</small></li>
                                                                        <li class=""><small>Size : '.$area.'</small>
                                                                        </li>
                                                                        <li class=""><small>Type : '.$row->accommodations->implode('name', ', ').'</small>
                                                                        </li>
                                                                        <li class=""><small>Location : '.$row->mainCommunity->name.'</small>
                                                                        </li>
                                                                    </ul>
                                                                    <small class="text-secondary">'. $row->developer->name .'</small>
                                                                </div>
                                                                <div
                                                                    class="card-footer border-0 bg-white rounded-0 rounded-oneCorner">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="my-auto">
                                                                            <ul class="list-unstyled  mb-0">
                                                                                <li class="d-inline propOpt">
                                                                                    <a href="tel:'.$tel.'"
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
                                                                                    <a href="'.$whatsapp.'"
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
                                                                                    <a href="mailto:'.$email.'"
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
                                                                        <div class="my-auto">';
                                                                            if($row->is_new_launch == 1){
                                                                                $output .='<button type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#preRegister" propertyUrl="'. url('dubai-offplan' . '/' . $row->slug) .'" formName="Pre-Register Now"
                                                                                    class="btn btn-sm fs-12 btn-primary rounded-1 bookpreRegisterBtn text-uppercase px-3">Pre-Register</button>';
                                                                            }else{
                                                                                $output .=' <button type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#preRegister"  propertyUrl="'. url('dubai-offplan' . '/' . $row->slug) .'" formName="Enquire Now"
                                                                                    class="btn btn-sm fs-12 btn-primary rounded-1 bookpreRegisterBtn text-uppercase px-3">Enquire
                                                                                    Now <i
                                                                                        class="bi bi-chevron-right"></i></button>';
                                                                            }
                                                                            $output .='</div>
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
                                                        '. $projects->withQueryString()->links() .'
                                                    </div>
                                                    <div class="pcPagination justify-content-center">
                                                        '. $projects->withQueryString()->links() .'
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>';
                                    }else{
                                        $output .='<div class="text-center">
                                            <p class="text-primary">No Project Found</p>
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
