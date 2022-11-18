@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_no">{{ trans('cruds.order.fields.order_no') }}</label>
                <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="text" name="order_no" id="order_no" value="{{ old('order_no', $order->order_no) }}">
                @if($errors->has('order_no'))
                    <span class="text-danger">{{ $errors->first('order_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.order.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $order->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.order.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $order->company) }}">
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plate_number">{{ trans('cruds.order.fields.plate_number') }}</label>
                <input class="form-control {{ $errors->has('plate_number') ? 'is-invalid' : '' }}" type="text" name="plate_number" id="plate_number" value="{{ old('plate_number', $order->plate_number) }}" required>
                @if($errors->has('plate_number'))
                    <span class="text-danger">{{ $errors->first('plate_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.plate_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fuel_id">{{ trans('cruds.order.fields.fuel') }}</label>
                <select class="form-control select2 {{ $errors->has('fuel') ? 'is-invalid' : '' }}" name="fuel_id" id="fuel_id" required>
                    @foreach($fuels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('fuel_id') ? old('fuel_id') : $order->fuel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('fuel'))
                    <span class="text-danger">{{ $errors->first('fuel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.fuel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.order_size') }}</label>
                @foreach(App\Models\Order::ORDER_SIZE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('order_size') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="order_size_{{ $key }}" name="order_size" value="{{ $key }}" {{ old('order_size', $order->order_size) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="order_size_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('order_size'))
                    <span class="text-danger">{{ $errors->first('order_size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="preferred_date">{{ trans('cruds.order.fields.preferred_date') }}</label>
                <input class="form-control datetime {{ $errors->has('preferred_date') ? 'is-invalid' : '' }}" type="text" name="preferred_date" id="preferred_date" value="{{ old('preferred_date', $order->preferred_date) }}" required>
                @if($errors->has('preferred_date'))
                    <span class="text-danger">{{ $errors->first('preferred_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.preferred_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $order->total) }}" step="1">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                <select class="form-control select2 {{ $errors->has('payment') ? 'is-invalid' : '' }}" name="payment_id" id="payment_id" required>
                    @foreach($payments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('payment_id') ? old('payment_id') : $order->payment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment'))
                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', $order->payment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <span class="text-danger">{{ $errors->first('payment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="updated_by_id">{{ trans('cruds.order.fields.updated_by') }}</label>
                <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                    @foreach($updated_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $order->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by'))
                    <span class="text-danger">{{ $errors->first('updated_by') }}</span>
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



@endsection