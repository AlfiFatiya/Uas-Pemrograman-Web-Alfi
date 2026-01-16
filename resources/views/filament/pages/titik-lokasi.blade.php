<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div id="map" style="height: 500px; border-radius: 8px;"></div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Daftar Lokasi Pendaftaran</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Handphone
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Koordinat
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($this->getViewData() ['formulirs'] as $formulir)
                           <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> 
                                    {{ $formulir['first_name'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $formulir ['username'] }}           
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $formulir ['handphone'] }}   
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $formulir ['Latitude']}}, {{ $formulir ['Longitude'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
            crossorigin="" />
        <style>
            .leaflet-popup-content {
                margin: 13px 19px;
                line-height: 1.4;
            }
            .leaflet-popup-content h4 {
                margin: 8px 0;
                font-weight: 600;
                font-size: 16px;
            }
            .leaflet-popup-content p {
                margin: 4px 0;
                font-size: 13px;
            }
        </style>
        @endpush

        @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                //initialize the map
                const map = L.map('map').setView([-7.250445, 112.768845], 13); 

                //Add Openstreetmap tile 
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    var formulirs = @json($this->getViewData() ['formulirs']);

                    formulirs.forEach(function (formulir) {
                        if (formulir.Latitude && formulir.Longitude) {
                            var marker = L.marker([formulir.Latitude, formulir.Longitude]).addTo(map);

                            var popupContent = `
                                <h4>${formulir.first_name}</h4>
                                <p><strong>Username:</strong> ${formulir.username}</p>
                                <p><strong>Handphone:</strong> ${formulir.handphone}</p>
                            `;
                            marker.bindPopup(popupContent);
                        }
                    });

                    //fit bounds to show all markers
                    if (formulirs.length > 0) {
                        var group = new L.featureGroup(formulirs.map(function (formulir) {
                            return L.marker([formulir.Latitude, formulir.Longitude]);
                        }));
                        map.fitBounds(group.getBounds().pad(0.5));
                    }
                });
            </script>
            @endpush
</x-filament-panels::page>
