let dragAreas = document.querySelectorAll(".cv-left");
        dragAreas.forEach(element => {
            let cvClassNameLeft = element.parentElement.parentElement.parentElement.parentElement.className.split(" ");
            new Sortable(element, {
                group: 'shared',
                handle: '.drag-handle',
                chosenClass: 'drag-chosen',
                ghostClass: "drag-ghost",
                dragClass: "drag-drop",
                store: {
                    get: function (sortable) {
                        var orderLeft = localStorage.getItem("orderLeft-" + cvClassNameLeft[1]);
                        return orderLeft ? orderLeft.split('|') : [];
                    },
                    set: function (sortable) {
                        var orderLeft = sortable.toArray();
                        localStorage.setItem("orderLeft-" + cvClassNameLeft[1], orderLeft.join('|'));
                    }
                },
                animation: 550,
                easing: "cubic-bezier(0.25, 1, 0.5, 1)"
        });
    });

    let dragAreas2 = document.querySelectorAll(".cv-right");
        dragAreas2.forEach(element => {
            let cvClassNameRight = element.parentElement.parentElement.parentElement.parentElement.className.split(" ");
            new Sortable(element, {
               group: 'shared',
               handle: '.drag-handle',
               chosenClass: 'drag-chosen',
               ghostClass: "drag-ghost",
               dragClass: "drag-drop",
                store: {
                    get: function (sortable) {
                        var orderRight = localStorage.getItem("orderRight-" + cvClassNameRight[1]);
                        return orderRight ? orderRight.split('|') : [];
                    },
                    set: function (sortable) {
                        var orderRight = sortable.toArray();
                        localStorage.setItem("orderRight-" + cvClassNameRight[1], orderRight.join('|'));
                    }
                },
                animation: 550
        });
    });


    let dragAreasRow = document.querySelectorAll(".row");
        dragAreasRow.forEach(element => {
            new Sortable(element, {
                // group: 'shared',
                handle: '.drag-handle',
                chosenClass: 'drag-chosen',
                ghostClass: "drag-ghost",
                dragClass: "drag-drop",
                store: {
                    get: function (sortable) {
                        var orderRow = localStorage.getItem("orderRow");
                        return orderRow ? orderRow.split('|') : [];
                    },
                    set: function (sortable) {
                        var orderRow = sortable.toArray();
                        localStorage.setItem("orderRow", orderRow.join('|'));
                    }
                },
            animation: 350
        });
    });
