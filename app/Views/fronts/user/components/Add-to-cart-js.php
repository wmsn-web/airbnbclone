<script>
    document.addEventListener("DOMContentLoaded", async function() {

        async function postData(url, data) {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams(data)
            });
            return response.json();
        }

        function updateSummary(rooms) {
            const container = document.getElementById("summary-rooms");
            container.innerHTML = "";

            let total = 0;

            Object.values(rooms).forEach(r => {
                total += parseFloat(r.price);

                container.innerHTML += `
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <button class="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary remove-room-btn" data-room-id="${r.id}">
                            <span class="fa-solid fa-circle-xmark"></span>
                        </button>

                        <div class="d-flex justify-content-between gap-3 mb-4">
                            <div><h5 class="text-body-highlight">${r.name}</h5></div>
                            <h4 class="mb-0">$${r.price}</h4>
                        </div>
                        <div class="row align-items-center g-0">
                            <div class="col-3">
                                <h5 class="text-body text-nowrap mb-0">Check in</h5>
                            </div>
                            <div class="col-auto"><span class="px-2">:</span></div>
                            <div class="col-auto"><span>${r.startDate}</span></div>
                        </div>
                        <div class="row align-items-center g-0 mb-4">
                            <div class="col-3">
                                <h5 class="text-body text-nowrap mb-0">Check out</h5>
                            </div>
                            <div class="col-auto"><span class="px-2">:</span></div>
                            <div class="col-auto"><span>${r.endDate}</span></div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                <span class="fa-solid fa-bed fs-9 me-2"></span>
                                <span>Double bed</span>
                            </span>
                            <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                <span class="fa-solid fa-user fs-9 me-2"></span>
                                <span>${r.adults} Adults</span>
                            </span>
                            <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                <span class="fa-solid fa-baby fs-9 me-2"></span>
                                <span>${r.children} Childs</span>
                            </span>
                            <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                <span class="fa-solid fa-moon fs-9 me-2"></span>
                                <span>3 Nights</span>
                            </span>
                        </div>
                    </div>
                </div>
            `;
            });

            document.getElementById("summary-total").textContent = "$" + total.toFixed(2);
        }

        // Load existing rooms on page refresh
        const saved = await fetch("<?= base_url('cart/getRooms'); ?>").then(res => res.json());
        updateSummary(saved.rooms);

        // Add room
        const addRoomCart = document.querySelectorAll(".add-room-btn");
        if (addRoomCart) {
            addRoomCart.forEach(btn => {
                btn.addEventListener("click", async () => {
    
                    const data = await postData("<?= base_url('cart/addRoom'); ?>", {
                        id: btn.dataset.roomId,
                        name: btn.dataset.roomName,
                        price: btn.dataset.roomPrice,
                        startDate: btn.dataset.roomIn,
                        endDate: btn.dataset.roomOut,
                        adults: btn.dataset.roomAdults,
                        infants: btn.dataset.roomInfants,
                        children: btn.dataset.roomChildren
                    });
    
                    updateSummary(data.rooms);
                });
            });
        }

        // Remove room
        document.addEventListener("click", async function(e) {
            const btn = e.target.closest(".remove-room-btn");
            if (!btn) return;

            const data = await postData("<?= base_url('cart/removeRoom'); ?>", {
                id: btn.dataset.roomId
            });

            updateSummary(data.rooms);
        });

    });
</script>