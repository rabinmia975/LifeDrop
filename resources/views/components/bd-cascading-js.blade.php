@php
    $bdLocations = \App\Services\LocationService::tree();
@endphp
<script>
    const bdLocationsData = @json($bdLocations);

    function initCascadingDropdowns(divId, distId, upaId, defaults = {}) {
        const divEl = document.getElementById(divId);
        const distEl = document.getElementById(distId);
        const upaEl = document.getElementById(upaId);

        if (!divEl || !distEl) return;

        // Pre-populate from defaults: {division: '...', district: '...', upazila: '...'}
        if (defaults.division) {
            divEl.value = defaults.division;
            divEl.dispatchEvent(new Event('change'));
        }
        if (defaults.district) {
            setTimeout(() => {
                distEl.value = defaults.district;
                distEl.dispatchEvent(new Event('change'));
            }, 0);
        }
        if (defaults.upazila) {
            setTimeout(() => { if (upaEl) upaEl.value = defaults.upazila; }, 20);
        }

        divEl.addEventListener('change', function () {
            const matchedDiv = bdLocationsData[this.value] || null;

            distEl.innerHTML = '<option value="">নির্বাচন করুন</option>';
            if (upaEl) upaEl.innerHTML = '<option value="">নির্বাচন করুন</option>';

            if (matchedDiv) {
                Object.keys(matchedDiv.districts).forEach(function (distName) {
                    const opt = document.createElement('option');
                    opt.value = distName;
                    opt.textContent = distName;
                    distEl.appendChild(opt);
                });
            }
        });

        if (distEl && upaEl) {
            distEl.addEventListener('change', function () {
                const matchedDiv = bdLocationsData[divEl.value] || null;
                const matchedDist = matchedDiv && matchedDiv.districts[this.value] ? matchedDiv.districts[this.value] : null;

                upaEl.innerHTML = '<option value="">নির্বাচন করুন</option>';

                if (matchedDist) {
                    matchedDist.upazilas.forEach(function (upaName) {
                        const opt = document.createElement('option');
                        opt.value = upaName;
                        opt.textContent = upaName;
                        upaEl.appendChild(opt);
                    });
                }
            });
        }
    }
</script>
