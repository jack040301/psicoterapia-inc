const date = new Date();

const renderCalendar = () => {
	date.setDate(1);
  // console.log(date.getDay());

const monthDays = document.querySelector(".days");

const lastday = new Date(date.getFullYear(),date.getMonth() + 1,0).getDate();

const FirstDayIndex = date.getDay();

const prevlastday = new Date(date.getFullYear(),date.getMonth(),0).getDate();

const lastdayIndex = new Date(date.getFullYear(),date.getMonth() + 1,0).getDay();
// console.log(lastdayIndex);

const nextdays = 7 - lastdayIndex - 1;

// console.log(nextdays);
//console.log(date);
// console.log(months);
const months = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December",
];

document.querySelector(".date h3").innerHTML = months[date.getMonth()] + " " + date.getFullYear();
// document.querySelector(".date p").innerHTML = new Date().toDateString();

let days = "";

for(let x = FirstDayIndex; x > 0; x--){
	days += `<div class="prev-date">${prevlastday - x + 1}</div>`;
}

for(let i = 1; i <= lastday; i++ ){
	if(i === new Date().getDate() && date.getMonth() === new Date().getMonth()){
		days += `<div class="today">${i}</div>`;
	}
	else{
		days += `<div>${i}</div>`;
	}
}

for(let j = 1; j <= nextdays; j++){
	days += `<div class="next-date">${j}</div>`;
	
}
monthDays.innerHTML = days;
}



document.querySelector(".prev").addEventListener("click", () => {
	date.setMonth(date.getMonth() - 1);
	renderCalendar();
})

document.querySelector(".next").addEventListener("click", () => {
	date.setMonth(date.getMonth() + 1);
	renderCalendar();
})

renderCalendar();