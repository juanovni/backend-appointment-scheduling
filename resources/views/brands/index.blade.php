@extends('layouts.app-master')


@section('breadcrumb')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    @include('layouts.partials.page-title', ['title' => $title])

    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('brands.index') }}" class="text-muted text-hover-primary">Marcas</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted"> Lista </li>
    </ul>
</div>
@endsection

@section('header_meta_page')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="card card-flush">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-brands-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Buscar" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-shipping-address-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Filtro</button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Opciones</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5" data-kt-brands-table-filter="form">
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Estado:</label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Seleccionar estado" data-allow-clear="true" data-kt-brands-table-filter="role" data-hide-search="true">
                                    <option></option>
                                    <option value="activa">Activa</option>
                                    <option value="inactiva">Inactiva</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-brands-table-filter="reset">Limpiar</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-brands-table-filter="filter">Aplicar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_brand">
                        Crear Marca
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            @if ($brands->count() > 0)
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_business_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-100px align-middle" data-column="1">Nombre</th>
                        <th class="align-middle text-center" data-column="2">Cantidad Modelos</th>
                        <th class="align-middle" data-column="3">Estado</th>
                        <th class="text-end" data-column="4"></th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach($brands as $brand)
                    <tr>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="https://picker.grelive.com/users/12" class="text-gray-800 text-hover-primary mb-1 user_name">
                                    <span id="brand_name"> {{ $brand->nombre }}</span>
                                </a>
                                <!-- <span> {{ $brand->guid }}
                                </span> -->
                            </div>
                        </td>
                        <td class="text-center pe-0">{{ $brand->carModels->count() }}</td>
                        <td class="align-middle">
                            @if( $brand->estado == 1 )
                            <div class="badge badge-light-success">Activa</div>
                            @elseif( $brand->estado == 0 )
                            <span class="badge badge-light-danger">Inactiva</span>
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acciones
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="" class="menu-link px-3">Editar</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-id="{{$brand->id}}" data-kt-brands-table-filter="delete_row">Eliminar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center">No existen direcciones de envío creadas.</p>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_brand" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <div class="mb-13 text-center">
                    <h1 class="mb-3">Agregar Marca</h1>
                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="ms-1" data-bs-toggle="tooltip" title="Especifique un nombre único para el plan de tarifas a utilizar">
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>

                </div>
                <div class="d-flex flex-column mb-8">

                </div>
                <div class="d-flex flex-column mb-8">

                </div>

                <div class="d-flex justify-content-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('top_js_page')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/brands/list.js') }}"></script>

<script>
    $(document).ready(function() {
        const table = new DataTable('#kt_business_table');
        document.querySelectorAll('.toggle-visible').forEach((el) => {
            let column = table.column(el.getAttribute('data-column'));
            column.visible(!column.visible());
        });
    });
</script>
@endsection