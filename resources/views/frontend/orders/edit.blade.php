@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.update", [$order->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.order.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $order->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="company">{{ trans('cruds.order.fields.company') }}</label>
                            <input class="form-control" type="text" name="company" id="company" value="{{ old('company', $order->company) }}">
                            @if($errors->has('company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="plate_number">{{ trans('cruds.order.fields.plate_number') }}</label>
                            <input class="form-control" type="text" name="plate_number" id="plate_number" value="{{ old('plate_number', $order->plate_number) }}" required>
                            @if($errors->has('plate_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('plate_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.plate_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fuel_id">{{ trans('cruds.order.fields.fuel') }}</label>
                            <select class="form-control select2" name="fuel_id" id="fuel_id" required>
                                @foreach($fuels as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fuel_id') ? old('fuel_id') : $order->fuel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fuel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fuel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.fuel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.order_size') }}</label>
                            @foreach(App\Models\Order::ORDER_SIZE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="order_size_{{ $key }}" name="order_size" value="{{ $key }}" {{ old('order_size', $order->order_size) === (string) $key ? 'checked' : '' }} required>
                                    <label for="order_size_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('order_size'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order_size') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.order_size_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="preferred_date">{{ trans('cruds.order.fields.preferred_date') }}</label>
                            <input class="form-control datetime" type="text" name="preferred_date" id="preferred_date" value="{{ old('preferred_date', $order->preferred_date) }}" required>
                            @if($errors->has('preferred_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('preferred_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.preferred_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                            <select class="form-control select2" name="payment_id" id="payment_id" required>
                                @foreach($payments as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('payment_id') ? old('payment_id') : $order->payment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.payment_status') }}</label>
                            <select class="form-control" name="payment_status" id="payment_status" required>
                                <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::PAYMENT_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('payment_status', $order->payment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.payment_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="updated_by_id">{{ trans('cruds.order.fields.updated_by') }}</label>
                            <select class="form-control select2" name="updated_by_id" id="updated_by_id">
                                @foreach($updated_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $order->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('updated_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('updated_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.updated_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection