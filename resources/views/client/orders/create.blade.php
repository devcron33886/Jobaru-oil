@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('frontend.orders.store') }}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="required" for="name">{{ trans('cruds.order.fields.name') }}</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="company">{{ trans('cruds.order.fields.company') }}</label>
                                    <input class="form-control" type="text" name="company" id="company"
                                        value="{{ old('company', '') }}">
                                    @if ($errors->has('company'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('company') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.company_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="required"
                                        for="plate_number">{{ trans('cruds.order.fields.plate_number') }}</label>
                                    <input class="form-control" type="text" name="plate_number" id="plate_number"
                                        value="{{ old('plate_number', '') }}" required>
                                    @if ($errors->has('plate_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('plate_number') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.plate_number_helper') }}</span>
                                </div>
                                <div class="form-group col-6">
                                    <label class="required" for="fuel_id">{{ trans('cruds.order.fields.fuel') }}</label>
                                    <select class="form-control select2" name="fuel_id" id="fuel_id" required>
                                        @foreach ($fuels as $id => $entry)
                                            <option value="{{ $id }}"
                                                {{ old('fuel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('fuel'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('fuel') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.fuel_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="required"
                                        for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                                    <input class="form-control" type="number" name="quantity" id="quantity"
                                        value="{{ old('quantity', '') }}" step="1" required>
                                    @if ($errors->has('quantity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('quantity') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                                </div>
                                <div class="form-group col-6">
                                    <label class="required">{{ trans('cruds.order.fields.order_size') }}</label>
                                    @foreach (App\Models\Order::ORDER_SIZE_RADIO as $key => $label)
                                        <div>
                                            <input type="radio" id="order_size_{{ $key }}" name="order_size"
                                                value="{{ $key }}"
                                                {{ old('order_size', '') === (string) $key ? 'checked' : '' }} required>
                                            <label for="order_size_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if ($errors->has('order_size'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('order_size') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.order_size_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="required"
                                        for="preferred_date">{{ trans('cruds.order.fields.preferred_date') }}</label>
                                    <input class="form-control datetime" type="text" name="preferred_date"
                                        id="preferred_date" value="{{ old('preferred_date') }}" required>
                                    @if ($errors->has('preferred_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('preferred_date') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.preferred_date_helper') }}</span>
                                </div>
                                <div class="form-group col-6">
                                    <label class="required"
                                        for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                                    <select class="form-control select2" name="payment_id" id="payment_id" required>
                                        @foreach ($payments as $id => $entry)
                                            <option value="{{ $id }}"
                                                {{ old('payment_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('payment'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('payment') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                                </div>
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
