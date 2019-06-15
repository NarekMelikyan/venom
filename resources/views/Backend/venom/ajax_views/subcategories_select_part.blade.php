@foreach($subcategories as $key=> $subcategory)
    <option value="{{$subcategory->id}}">{{$subcategory->translation->name}}</option>
@endforeach