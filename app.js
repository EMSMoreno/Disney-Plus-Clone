const carousel = document.querySelector('.carousel');
let sliders = []

let slideIndex = 0;

const createSlide = () => {
	if (slideIndex >= movies.length){
		slideIndex = 0;
	}

	//criacao Modelo Objeto de Documento (DOM)
	let slide = document.createElement('div');
	let imgElement = document.createElement('img');
	let content = document.createElement('div');
	let h1 = document.createElement('h1');
	let p = document.createElement('p');

	//anexar todos os elementos
	imgElement.appendChild(document.createTextNode(''));
	h1.appendChild(document.createTextNode(movies[slideIndex].name));
	p.appendChild(document.createTextNode(movies[slideIndex].des));
	content.appendChild(h1);
	content.appendChild(p);
	slide.appendChild(content);
	slide.appendChild(imgElement);
	carousel.appendChild(slide);

	//preparar imagem
	imgElement.src = movies[slideIndex].image;
	slideIndex++;

	//preparar elementos de class (classe)
	slide.className = 'slider';
	content.className = 'slide-content';
	h1.className = 'movie-title';
	p.className = 'movies-des';

	sliders.push(slide);

	//adicionar o efeito de deslizar (slide)

	if(sliders.length){
		sliders[0].style.marginLeft = `calc(-${100 * (sliders.length - 2)} - ${30 * (sliders.length - 2)}px)`;
	}
}

setInterval(() => {
	createSlide();
}, 3000);

///video cards (cartões)

const videoCards = [...document.querySelectorAll('.video-card')];

videoCards.forEach(item => {
	item.addEventListener('mouseover', () => {
		let video = item.children[1];
		video.play();
	})
	item.addEventListener('mouseleave', () => {
		let video = item.children[1];
		video.pause();
	})
})
	
//slide dos cartões

let cardContainers = [...document.querySelectorAll('.card-container')];
let preBtns = [...document.querySelectorAll('.pre-btn')];
let nxtBtns = [...document.querySelectorAll('.nxt-btn')];

cardContainers.forEach((item, i) => {
	let containerDimensions = item.getBoundingClientRect();
	let containerWidth = containerDimensions.width;

	nxtBtns[i].addEventListener('click', () => {
		item.scrollLeft += containerWidth - 300;
	})

	preBtns[i].addEventListener('click', () => {
		item.scrollLeft -= containerWidth + 300;
	
})

})