@php

use App\Parameter_pro;

use App\Parameterpro_cat;

@endphp



@php

$t = 0;

@endphp



@foreach ($groupIdParent3 as $parent)



    @php
        
        $t++;
        
    @endphp



    @php
        
        $paraInfo = Parameter_pro::find($parent);
        
        $paraEng = $paraInfo->paraEng;
        
    @endphp



    <h1 class="filter-head">{{ $paraInfo->para_title }}</h1>



    <div class="filter-body row">



        @php
            
            $groupParaChildren = Parameterpro_cat::where([['parent_id', $parent], ['cat_id', $id]])->get();
            
            // echo $groupParaChildren;
            
            $groupChildId = [];
            
            foreach ($groupParaChildren as $child) {
                $groupChildId[] = $child->para_id;
            }
            
            $paraChildren = Parameter_pro::whereIn('id', $groupChildId)->get();
            
        @endphp



        @foreach ($paraChildren as $childItem)



            <div class="item col-md-6 mb-1">



                <input type="checkbox" class="form-check-input  op{{ $t }}"
                    id="{{ $childItem->para_title }}" name="{{ $paraEng }}[]" @foreach ($op as $opHA)
                @if (in_array($childItem->para_title, $opHA))
                    checked
                @endif
        @endforeach


        value="{{ $childItem->para_title }}">



        <label for="{{ $childItem->para_title }}" class="form-check-label">{{ $childItem->para_title }}</label>



    </div>



@endforeach



</div>



@endforeach
