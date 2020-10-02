<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check Log Calories') }}
        </h2>
    </x-slot>

    
    <div class="card">
        <div class="col-md-12">

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('log-calories.store') }}">
                <x-jet-validation-errors class="mb-4" />
                @csrf

                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700" for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="jenis_kelamin">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
        
                <div class="mt-4">
                    <x-jet-label value="{{ __('Berat Badan') }}" />
                    <x-jet-input class="block mt-1 w-full" type="number" name="berat_badan" :value="old('berat_badan')" placeholder="Berat Badan" required />
                </div>
                
                <div class="mt-4">
                    <x-jet-label value="{{ __('Tinggi Badan') }}" />
                    <x-jet-input class="block mt-1 w-full" type="number" name="tinggi_badan" :value="old('tinggi_badan')" placeholder="Tinggi Badan" required />
                </div>
                
                <div class="mt-4">
                    <x-jet-label value="{{ __('Nama Makanan') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="makanan" :value="old('makanan')" placeholder="Nama Makanan" required />
                </div>

                <div class="mt-4">
                    <x-jet-label value="{{ __('Jumlah Kalori Makanan') }}" />
                    <x-jet-input class="block mt-1 w-full" type="number" name="calories" :value="old('calories')" placeholder="Jumlah Kalori Makanan" required />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Calculate') }}
                    </x-jet-button>
                </div>
            </form>

            <br/>
            
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('suggested_menu'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p>{{ session('suggested_menu')->menu }}</p>
                    <p>Jumlah kalori {{ session('suggested_menu')->calories }} Kkal</p> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (count($log_calories) > 0)
                <div class="col-md-12">
                    <p>
                        List Log Kalori Hari Ini
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu Makanan</th>
                                <th scope="col">Kalori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($log_calories as $log_calorie)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $log_calorie->makanan }}</td>
                                <td>{{ $log_calorie->calories }}</td>
                            </tr>    
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    
    
</x-app-layout>
