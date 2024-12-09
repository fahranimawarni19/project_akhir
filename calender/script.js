document.addEventListener('DOMContentLoaded', function () {
    const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    const date = new Date();
    let currentMonth = date.getMonth();
    let currentYear = date.getFullYear();

    const monthElement = document.getElementById('month');
    const yearElement = document.getElementById('year');
    const calendarBody = document.getElementById('calendar-body');

    function updateCalendar(month, year) {
        monthElement.textContent = monthNames[month];
        yearElement.textContent = year;

        calendarBody.innerHTML = '';
        const firstDay = (new Date(year, month)).getDay();
        const daysInMonth = 32 - new Date(year, month, 32).getDate();

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement('td');
                if (i === 0 && j < firstDay) {
                    cell.textContent = '';
                } else if (date > daysInMonth) {
                    break;
                } else {
                    cell.textContent = date;
                    date++;
                }
                row.appendChild(cell);
            }

            calendarBody.appendChild(row);
        }
    }

    window.prevMonth = function () {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        updateCalendar(currentMonth, currentYear);
    }

    window.nextMonth = function () {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        updateCalendar(currentMonth, currentYear);
    }

    updateCalendar(currentMonth, currentYear);
});
