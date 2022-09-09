@push('styles')
<style>

</style>
@endpush
<div>
    <div class="my-3 text-center">
        <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Display Quran
            In Arabic</h4>
        <a href="{{ route('website') }}" type="button" class="btn btn-primary">
            Home
        </a>
        <a href="{{ route('search-list') }}" type="button" class="btn btn-primary">
            Search List
        </a>
    </div>
    <div style="padding-left: 20px; padding-right: 20px;" class="row">
        <div style="padding-left: 20px;" class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabOne')"
                            class="nav-link @if($tabStatus == 'tabOne') active @endif" id="pills-home-tab"
                            type="button">Display Complete Quran Sorted By:
                            Root Word</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabTwo')"
                            class="nav-link @if($tabStatus == 'tabTwo') active @endif" id="pills-profile-tab"
                            type="button">Display Complete Quran Sorted
                            By: Normalized Arabic Word</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade @if($tabStatus == 'tabOne') show active @endif">
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura-Ayat</th>
                                    <th>Arabic Root Word</th>
                                    <th>Normalized Arabic Word</th>
                                    <th>Sura Ayat Arabic Description</th>
                                </tr>
                                @php
                                $sl = ($display_quran_arabic->perPage() *
                                $display_quran_arabic->currentPage())-($display_quran_arabic->perPage() - 1)
                                @endphp
                                @if ($display_quran_arabic->count() > 0)
                                @foreach ($display_quran_arabic as $ayat_word)
                                <tr>
                                    <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                                    <td>{{ $ayat_word->arabic_root_word }}</td>
                                    <td>{{ $ayat_word->normalized_arabic_word }}</td>
                                    <td>{{
                                        suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_arabic_description
                                        }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align: center;">No data available!</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        {{ $display_quran_arabic->links('pagination-links-table') }}
                    </div>
                    <div class="tab-pane fade @if($tabStatus == 'tabTwo') show active @endif">
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura-Ayat</th>
                                    <th>Normalized Arabic Word</th>
                                    <th>Arabic Root Word</th>
                                    <th>Sura Ayat Arabic Description</th>
                                </tr>
                                @php
                                $sl = ($display_quran_arabic_tab_two->perPage() *
                                $display_quran_arabic_tab_two->currentPage())-($display_quran_arabic_tab_two->perPage()
                                - 1)
                                @endphp
                                @if ($display_quran_arabic_tab_two->count() > 0)
                                @foreach ($display_quran_arabic_tab_two as $ayat_word)
                                <tr>
                                    <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                                    <td>{{ $ayat_word->normalized_arabic_word }}</td>
                                    <td>{{ $ayat_word->arabic_root_word }}</td>
                                    <td>{{
                                        suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_arabic_description
                                        }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align: center;">No data available!</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        {{ $display_quran_arabic_tab_two->links('pagination-links-table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>