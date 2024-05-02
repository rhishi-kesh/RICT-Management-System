document.addEventListener('alpine:init', () => {
    // main section
    Alpine.data('scrollToTop', () => ({
        showTopButton: false,
        init() {
            window.onscroll = () => {
                this.scrollFunction();
            };
        },

        scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                this.showTopButton = true;
            } else {
                this.showTopButton = false;
            }
        },

        goToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
    }));

    // sidebar section
    Alpine.data('sidebar', () => ({
        init() {
            const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
            if (selector) {
                selector.classList.add('active');
                const ul = selector.closest('ul.sub-menu');
                if (ul) {
                    let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                    if (ele) {
                        ele = ele[0];
                        setTimeout(() => {
                            ele.click();
                        });
                    }
                }
            }
        },
    }));

    //Modal
    Alpine.data("modal", (initialOpenState = false) => ({
        open: initialOpenState,
        toggle() {
            this.open = !this.open;
        },
        init() {
            this.$wire.on('swal', () => {
                this.open = false;
            });
        }
    }));

    //Delete Alert
    window.addEventListener('confirmDeleteAlert', event => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteConfirm');
            }
        });
    });
    window.addEventListener('deleteSuccessFull', event => {
        const eventData = event.detail[0]; // Accessing the first element of the array
        if (eventData && eventData.title && eventData.type) {
            Swal.fire({
                icon: eventData.type,
                title: eventData.title,
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            console.error('Invalid event data format:', eventData);
        }
    });

    //insert & update alert
    window.addEventListener('swal', event => {
        const eventData = event.detail[0];
        if (eventData && eventData.title && eventData.type) {
            Swal.fire({
                icon: eventData.type,
                title: eventData.title,
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            console.error('Invalid event data format:', eventData);
        }
    });
});
