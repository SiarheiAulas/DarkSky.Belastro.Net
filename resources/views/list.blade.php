@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page">
            <div class="location-group">
                <div class="about-title">
                    Площадки группы "Infinity"
                </div>
				@include('tableheader')
				@foreach($location_infinity as $loc)
                @include('inforeach')            
                @endforeach
                    </table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Виктора Жука (г. Брест)
                </div>
   				@include('tableheader')
                @foreach($location_vBug as $loc)
				@include('inforeach')            
				@endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадка группы "Бетельгейзе"
                </div>
       				@include('tableheader')
                    @foreach($location_betelgeise as $loc)
	                @include('inforeach')            
					@endforeach  
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки астроклуба "hν"
                </div>
       				@include('tableheader')
                    @foreach($location_hv as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки астроклуба "Циррус" (г. Гомель)
                </div>
       				@include('tableheader')
                    @foreach($location_cirrus as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Ивана Прокопюка (г. Домачево)
                </div>
       				@include('tableheader')
                    @foreach($location_domachevo as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Обсерватории любителей астрономии
                </div>
       				@include('tableheader')
                    @foreach($location_observatory as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Astroplaces
                </div>
       				@include('tableheader')
                    @foreach($location_astroplaces as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
        </div>
        <x-footer/>
    @endsection
