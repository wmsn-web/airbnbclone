<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addRoomCatForm = document.querySelector("#addRoomCatForm");
        if (addRoomCatForm) {
            addRoomCatForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const getData = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });
                    const resp = await getData.json();

                    if (!resp) {
                        notyf.open({
                            type: 'error',
                            message: 'Network error, Try again!'
                        });
                    }
                    if (resp.success) {
                        notyf.open({
                            type: 'success',
                            message: resp.msg
                        });
                    } else {
                        let messages = resp.msg;
                        if (typeof messages === 'string') messages = [messages];
                        if (typeof messages === 'object') messages = Object.values(messages);

                        messages.forEach(m => {
                            notyf.open({
                                type: 'error',
                                message: m
                            });
                        });


                    }
                } catch (error) {
                    console.log(`Error : ${error}`);
                    notyf.open({
                        type: 'error',
                        message: error
                    });
                }
            })
        }
        const roomData = <?= json_encode($roomcats) ?>;
        
        const roomCatagory = document.getElementById("room-category");
        if (roomCatagory) {
            roomCatagory.addEventListener("change", function() {
                const selectedCat = this.value;
                const roomSelect = document.getElementById("room-name");
    
                roomSelect.innerHTML = "<option value=''>Select Room</option>";
    
                if (!selectedCat) return;
    
                const category = roomData.find(c => c.category === selectedCat);
                if (!category) return;
    
                category.rooms.forEach(room => {
                    const opt = document.createElement("option");
                    opt.value = room.id;
                    opt.textContent = room.room_name;
                    roomSelect.appendChild(opt);
                });
            });
        }
    });
</script>