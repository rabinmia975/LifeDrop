import './bootstrap';
import { bdLocations } from './bd-locations';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Cascading Division / District / Upazila Dropdowns
    const divisionSelects = document.querySelectorAll('select[data-location="division"], select:has(option[value="dhaka"]), select:has(option[value="ঢাকা"])');
    
    document.querySelectorAll('form, div').forEach(container => {
        const divSelect = container.querySelector('select:nth-of-type(1)');
        const distSelect = container.querySelector('select:nth-of-type(2)');
        const upaSelect = container.querySelector('select:nth-of-type(3)');

        if (divSelect && distSelect) {
            divSelect.addEventListener('change', (e) => {
                const val = e.target.value.toLowerCase();
                let districtsObj = null;

                // Match English key or Bengali name
                for (const key in bdLocations) {
                    if (key === val || bdLocations[key].name === e.target.value) {
                        districtsObj = bdLocations[key].districts;
                        break;
                    }
                }

                distSelect.innerHTML = '<option value="">জেলা নির্বাচন করুন</option>';
                if (upaSelect) upaSelect.innerHTML = '<option value="">উপজেলা / এলাকা নির্বাচন করুন</option>';
                distSelect.disabled = false;

                if (districtsObj) {
                    for (const distKey in districtsObj) {
                        const dist = districtsObj[distKey];
                        const opt = document.createElement('option');
                        opt.value = distKey;
                        opt.textContent = dist.name;
                        distSelect.appendChild(opt);
                    }
                }
            });

            if (distSelect && upaSelect) {
                distSelect.addEventListener('change', (e) => {
                    const divVal = divSelect.value.toLowerCase();
                    const distVal = e.target.value.toLowerCase();
                    let upazilasArr = [];

                    for (const key in bdLocations) {
                        if (key === divVal || bdLocations[key].name === divSelect.value) {
                            const dists = bdLocations[key].districts;
                            for (const dKey in dists) {
                                if (dKey === distVal || dists[dKey].name === e.target.value) {
                                    upazilasArr = dists[dKey].upazilas;
                                    break;
                                }
                            }
                        }
                    }

                    upaSelect.innerHTML = '<option value="">উপজেলা / এলাকা নির্বাচন করুন</option>';
                    upaSelect.disabled = false;

                    upazilasArr.forEach(upaName => {
                        const opt = document.createElement('option');
                        opt.value = upaName;
                        opt.textContent = upaName;
                        upaSelect.appendChild(opt);
                    });
                });
            }
        }
    });

    // 2. Interactive Blood Group Selector Buttons
    let selectedBloodGroup = '';
    const groupButtons = document.querySelectorAll('.grid button:has(:text-exact("A+")), .grid button:has(:text-exact("O-")), button.rounded-full');
    
    document.querySelectorAll('.rounded-full').forEach(btn => {
        const text = btn.innerText.trim();
        if (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'].includes(text)) {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const currentContainer = btn.closest('.grid');
                if (currentContainer) {
                    currentContainer.querySelectorAll('.rounded-full').forEach(b => {
                        b.classList.remove('bg-[#D32F2F]', 'text-white', 'border-[#D32F2F]');
                        b.classList.add('bg-white', 'text-[#1A0D0D]', 'border-[#EADEDE]');
                    });
                }
                
                if (selectedBloodGroup === text) {
                    selectedBloodGroup = '';
                } else {
                    selectedBloodGroup = text;
                    btn.classList.remove('bg-white', 'text-[#1A0D0D]', 'border-[#EADEDE]');
                    btn.classList.add('bg-[#D32F2F]', 'text-white', 'border-[#D32F2F]');
                }

                filterDonors();
            });
        }
    });

    // 3. Dynamic Search Filter Engine for Find Donor Page
    function filterDonors() {
        const cardsContainer = document.querySelector('main .grid.sm\\:grid-cols-2');
        if (!cardsContainer) return;

        const cards = cardsContainer.querySelectorAll('.rounded-lg.bg-white');
        const countText = document.querySelector('main p.text-sm.text-\\[\\#665252\\]');
        const readyCheckbox = document.querySelector('input[type="checkbox"]');

        let visibleCount = 0;

        cards.forEach(card => {
            const cardGroup = card.querySelector('span.rounded-full.font-bold')?.innerText.trim() || '';
            const cardStatus = card.querySelector('span.rounded-full.px-2\\.5')?.innerText.trim() || '';
            const cardLocation = card.querySelector('p.text-sm.text-\\[\\#665252\\]')?.innerText.trim() || '';

            let matchesGroup = !selectedBloodGroup || cardGroup === selectedBloodGroup;
            let matchesStatus = !readyCheckbox || !readyCheckbox.checked || cardStatus.includes('রক্তদানে প্রস্তুত');

            if (matchesGroup && matchesStatus) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countText) {
            countText.innerText = `${visibleCount} জন রক্তদাতা পাওয়া গেছে`;
        }
    }

    const readyCheckbox = document.querySelector('input[type="checkbox"]');
    if (readyCheckbox) {
        readyCheckbox.addEventListener('change', filterDonors);
    }

    const searchButtons = document.querySelectorAll('button:contains("খুঁজুন")');
    searchButtons.forEach(btn => {
        if (btn.innerText.includes('খুঁজুন')) {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                filterDonors();
            });
        }
    });

    // 4. Interactive Tabs for My Posts Page
    const tabButtons = document.querySelectorAll('div[role="tablist"] button, div.h-10 button');
    if (tabButtons.length > 0) {
        tabButtons.forEach((tabBtn, index) => {
            tabBtn.addEventListener('click', () => {
                tabButtons.forEach(b => {
                    b.classList.remove('bg-[#F4F0F0]', 'text-[#D32F2F]', 'font-semibold');
                    b.classList.add('text-[#665252]', 'font-medium');
                });
                tabBtn.classList.remove('text-[#665252]', 'font-medium');
                tabBtn.classList.add('bg-[#F4F0F0]', 'text-[#D32F2F]', 'font-semibold');
            });
        });
    }
});
