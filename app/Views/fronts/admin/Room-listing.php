<div class="content pt-0">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
        </ol>
    </nav>
    <div class="mb-7">
        <h2>Room Listing</h2>
        <div data-list='{"valueNames":["name","beds","guest","bathRooms","amenities","totalRooms"],"page":8}'>
            <div class="d-md-flex mt-5 mb-4"><button class="btn btn-primary me-4"><span class="fas fa-plus me-2"></span>Create Listing</button><button class="btn btn-link text-body me-4 px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Export</button>
                <div class="d-flex gap-2 ms-md-auto mt-3 mt-md-0">
                    <div class="search-box">
                        <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div><button class="btn btn-phoenix-primary px-3"><span class="fa-solid fa-filter" data-fa-transform="down-2"></span></button>
                </div>
            </div>
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table fs-9 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"room-listing-table-body"}' /></div>
                            </th>
                            <th class="sort text-body-tertiary align-middle white-space-nowrap" scope="col" data-sort="name" style="width:300px;">ROOM INFORMATION</th>
                            <th class="sort text-body-tertiary align-middle px-4" scope="col" style="width:200px;" data-sort="beds">NO. OF BEDS</th>
                            <th class="sort text-body-tertiary align-middle px-4" scope="col" data-sort="guest" style="width:200px;">NO. OF GUESTS</th>
                            <th class="sort text-body-tertiary align-middle px-4" scope="col" data-sort="bathRooms" style="width:140px;">BATHROOM</th>
                            <th class="text-body-tertiary align-middle ps-4" scope="col" data-sort="amenities" style="min-width:450px;">AMENITIES</th>
                            <th class="sort text-body-tertiary align-middle ps-4 text-end" scope="col" data-sort="totalRooms" style="width:180px;">TOTAL ROOM</th>
                            <th class="sort text-body-tertiary text-end align-middle pe-0 ps-4" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="room-listing-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Bunk Bed","category":"Standard Room","price":332.67,"img":"/img/hotels/17.png","bedRooms":"01","beds":"02","guest":"02","child":"01","bathRooms":"01","totalRooms":65,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","common area","bathtub","Heating","Telephone"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/17.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Bunk Bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Standard Room</h6>
                                        <h4 class="fw-bolder mb-0">$332.67</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">02</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+7 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">65</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"King bed","category":"Presidential Suite","price":450.67,"img":"/img/hotels/18.png","bedRooms":"02","beds":"03","guest":"02","child":"01","bathRooms":"02","totalRooms":23,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","common area","bathtub","Heating","Telephone","Television","common area"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/18.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">King bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Presidential Suite</h6>
                                        <h4 class="fw-bolder mb-0">$450.67</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">03</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+9 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">23</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Queen bed","category":"Deluxe Room","price":400.5,"img":"/img/hotels/19.png","bedRooms":"02","beds":"02","guest":"02","child":"01","bathRooms":"02","totalRooms":77,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","wifi","tv","common area","bathtub","Heating","Telephone","Television"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/19.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Queen bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Deluxe Room</h6>
                                        <h4 class="fw-bolder mb-0">$400.5</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">02</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+10 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">77</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Twin bed","category":"Family Room","price":600.41,"img":"/img/hotels/20.png","bedRooms":"03","beds":"05","guest":"07","child":"01","bathRooms":"03","totalRooms":12,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/20.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Twin bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Family Room</h6>
                                        <h4 class="fw-bolder mb-0">$600.41</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">03</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">05</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">07</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">03</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+3 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">12</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Single bed","category":"Honeymoon Suite","price":350.8,"img":"/img/hotels/21.png","bedRooms":"01","beds":"01","guest":"02","child":"00","bathRooms":"01","totalRooms":21,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","common area","bathtub"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/21.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Single bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Honeymoon Suite</h6>
                                        <h4 class="fw-bolder mb-0">$350.8</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">00</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+5 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">21</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Single bed","category":"Loft Suite","price":200.22,"img":"/img/hotels/22.png","bedRooms":"01","beds":"01","guest":"01","child":"00","bathRooms":"01","totalRooms":15,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","Television","common area","Kettle","iron"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/22.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Single bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Loft Suite</h6>
                                        <h4 class="fw-bolder mb-0">$200.22</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">00</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+7 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">15</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Double bed","category":"Corner Room","price":290.55,"img":"/img/hotels/23.png","bedRooms":"01","beds":"02","guest":"04","child":"00","bathRooms":"02","totalRooms":"08","amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","common area","bathtub","Heating"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/23.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Double bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Corner Room</h6>
                                        <h4 class="fw-bolder mb-0">$290.55</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">02</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">04</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">00</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+6 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">08</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Twin XL bed","category":"Ocean View Room","price":550.75,"img":"/img/hotels/24.png","bedRooms":"01","beds":"02","guest":"04","child":"01","bathRooms":"02","totalRooms":"06","amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/24.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Twin XL bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Ocean View Room</h6>
                                        <h4 class="fw-bolder mb-0">$550.75</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">02</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">04</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+3 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">06</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Quad Bed","category":"Standard Room","price":550.65,"img":"/img/hotels/20.png","bedRooms":"02","beds":"04","guest":"04","child":"00","bathRooms":"02","totalRooms":50,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","tv"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/20.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Quad Bed</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Standard Room</h6>
                                        <h4 class="fw-bolder mb-0">$550.65</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">04</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">04</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">00</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+4 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">50</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs-9 align-middle ps-0">
                                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Executive Suite","category":"Standard Room","price":750.67,"img":"/img/hotels/21.png","bedRooms":"01","beds":"01","guest":"02","child":"01","bathRooms":"01","totalRooms":22,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","wifi","tv","common area","bathtub","Heating","Telephone","Television","wifi","tv","common area","bathtub","Heating","Telephone","Television"]}' /></div>
                            </td>
                            <td class="align-middle py-4 name">
                                <div class="d-flex align-items-center gap-3"><a href="#!"> <img class="rounded-1 border border-translucent" src="../../../../assets/img/hotels/21.png" alt="" width="80" /></a>
                                    <div> <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!">Executive Suite</a>
                                        <h6 class="fw-seibold text-body text-nowrap mt-1 mb-2"><span class="fa-solid fa-border-all me-2"></span>Standard Room</h6>
                                        <h4 class="fw-bolder mb-0">$750.67</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle px-4 beds">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 guest">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                    <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                </div>
                            </td>
                            <td class="align-middle px-4 bathRooms">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                    <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                </div>
                            </td>
                            <td class="align-middle ps-4 amenities">
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">wifi</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">tv</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">bathtub</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Heating</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Telephone</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Television</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">common area</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Kettle</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">iron</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Coffee maker</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">refrigerator</span><span class="badge badge-phoenix bg-primary-subtle text-body-highlight py-1 fs-10">Room service</span><a class="fw-bold fs-9" href="#!">+17 More</a></div>
                            </td>
                            <td class="align-middle text-end ps-4 totalRooms">
                                <h2 class="text-body-secondary">22</h2>
                            </td>
                            <td class="align-middle ps-4">
                                <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center py-2 g-0">
                <div class="pagination d-none"></div>
                <div class="col d-flex fs-9">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less</a>
                </div>
                <div class="col-auto d-flex">
                    <button class="btn btn-link px-1 me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left me-2"></span>Previous</button><button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100">
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 mt-2 mt-sm-0 text-body">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;<a class="mx-1" href="https://themewagon.com/">Themewagon</a></p>
            </div>
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-body-tertiary text-opacity-85">v1.20.1</p>
            </div>
        </div>
    </footer>
</div>