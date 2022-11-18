@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.order.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $order->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $order->company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.plate_number') }}
                                    </th>
                                    <td>
                                        {{ $order->plate_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.fuel') }}
                                    </th>
                                    <td>
                                        {{ $order->fuel->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $order->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.order_size') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::ORDER_SIZE_RADIO[$order->order_size] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.preferred_date') }}
                                    </th>
                                    <td>
                                        {{ $order->preferred_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $order->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.payment') }}
                                    </th>
                                    <td>
                                        {{ $order->payment->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.payment_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::PAYMENT_STATUS_SELECT[$order->payment_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.updated_by') }}
                                    </th>
                                    <td>
                                        {{ $order->updated_by->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection