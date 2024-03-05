<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">AppKasir v1.0</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                @if (auth()->user()->access_level != 'kasir')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle" href="#"
                            data-bs-toggle="collapse" data-bs-target="#collapse_pembelian" aria-expanded="false"
                            aria-controls="collapse_pembelian">
                            <svg class="bi">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Pembelian
                        </a>
                    </li>
                    <div class="collapse" id="collapse_pembelian">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/pembelian">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Data Pembelian
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/suplier">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Data Suplier
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapse_penjualan" aria-expanded="false"
                        aria-controls="collapse_penjualan">
                        <svg class="bi">
                            <use xlink:href="#file-earmark" />
                        </svg>
                        Penjualan
                    </a>
                </li>
                <div class="collapse" id="collapse_penjualan">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/penjualan">
                                <svg class="bi">
                                    <use xlink:href="#file-earmark" />
                                </svg>
                                Data Penjualan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/pelanggan">
                                <svg class="bi">
                                    <use xlink:href="#file-earmark" />
                                </svg>
                                Data Pelanggan
                            </a>
                        </li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapse_produk" aria-expanded="false"
                        aria-controls="collapse_produk">
                        <svg class="bi">
                            <use xlink:href="#file-earmark" />
                        </svg>
                        Produk
                    </a>
                </li>
                <div class="collapse" id="collapse_produk">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/produk">
                                <svg class="bi">
                                    <use xlink:href="#file-earmark" />
                                </svg>
                                Data Produk
                            </a>
                        </li>
                        @if (auth()->user()->access_level == 'admin')
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/produk_kategori">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Kategori Produk
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if (auth()->user()->access_level == 'admin')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle" href="#"
                            data-bs-toggle="collapse" data-bs-target="#collapse_toko" aria-expanded="false"
                            aria-controls="collapse_toko">
                            <svg class="bi">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Toko
                        </a>
                    </li>
                    <div class="collapse" id="collapse_toko">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/toko">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Data Toko
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/user">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Manajer / Kasir
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/sign-out">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
