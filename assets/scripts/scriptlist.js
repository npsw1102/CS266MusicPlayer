const music = new Audio('assets/music/1.mp3');
const songs = [
    {
      id: '1',
      songName: 'Lavender Haze',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/1.jpg',
    },
    {
      id: '2',
      songName: 'Kiss Me More',
      songArtist: 'Doja Cat',
      poster: 'assets/images/2.jpg',
    },
    {
      id: '3',
      songName: '17 นาที',
      songArtist: 'MILLI, Mints',
      poster: 'assets/images/3.jpg',
    },
    {
      id: '4',
      songName: 'คนไม่คุย',
      songArtist: 'PROXIE',
      poster: 'assets/images/4.jpg',
    },
    /*.......New Song........*/
    {
      id: '5',
      songName: 'Double Take',
      songArtist: 'Dhruv',
      poster: 'assets/images/5.jpg',
    },
    {
      id: '6',
      songName: 'Let Me Know',
      songArtist: 'LANY',
      poster: 'assets/images/5.jpg',
    },
    {
      id: '7',
      songName: 'Paris in the rain',
      songArtist: 'Lauv',
      poster: 'assets/images/7.jpg',
    },
    {
      id: '8',
      songName: 'Reckless',
      songArtist: 'Madison Beer',
      poster: 'assets/images/8.jpg',
    },
    {
      id: '9',
      songName: 'Santa Tell Me',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/9.jpg',
    },
    {
      id: '10',
      songName: 'We\'re Good',
      songArtist: 'Dua Lipa',
      poster: 'assets/images/5.jpg',
    },
    {
      id: '11',
      songName: 'Cornelia Street',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/11.jpg',
    },
    {
      id: '12',
      songName: 'Adore You',
      songArtist: 'Harry Styles',
      poster: 'assets/images/12.jpg',
    },
    {
      id: '13',
      songName: 'Circle',
      songArtist: 'PostMalone',
      poster: 'assets/images/13.jpg',
    },
    {
      id: '14',
      songName: 'what would you do?',
      songArtist: 'Tate McRae',
      poster: 'assets/images/14.jpg',
    },
    {
      id: '15',
      songName: 'Die for You',
      songArtist: 'The Weekend',
      poster: 'assets/images/15.jpg',
    },
    {
      id: '16',
      songName: 'I Love You So',
      songArtist: 'The Walters',
      poster: 'assets/images/16.jpg',
    },
    {
      id: '17',
      songName: 'About Damn Time',
      songArtist: 'Lizzo',
      poster: 'assets/images/17.jpg',
    },
    {
      id: '18',
      songName: 'KIWI',
      songArtist: 'Harry Styles',
      poster: 'assets/images/18.jpg',
    },
    {
      id: '19',
      songName: 'Anxiety',
      songArtist: 'Julia Michaels ft.Selena Gomez',
      poster: 'assets/images/19.jpg',
    },
    {
      id: '20',
      songName: 'Red(Taylor\'s version)',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/20.jpg',
    },
    {
      id: '21',
      songName: 'Slow Dancing InTheDark',
      songArtist: 'Joji',
      poster: 'assets/images/21.jpg',
    },
    {
      id: '22',
      songName: 'Die for you',
      songArtist: 'Joji',
      poster: 'assets/images/22.jpg',
    },
    {
      id: '23',
      songName: 'After Hours',
      songArtist: 'The Weekend',
      poster: 'assets/images/23.jpg',
    },
    {
      id: '24',
      songName: 'Changes',
      songArtist: 'Jeff Bernat',
      poster: 'assets/images/24.jpg',
    },
    {
      id: '25',
      songName: 'Green Tea & Honey',
      songArtist: 'JoDane Amar',
      poster: 'assets/images/25.jpg',
    },
    {
      id: '26',
      songName: 'Roses',
      songArtist: 'Finn Askew',
      poster: 'assets/images/26.jpg',
    },
    {
      id: '27',
      songName: 'Golden Hours',
      songArtist: 'JVKE',
      poster: 'assets/images/27.jpg',
    },
    {
      id: '28',
      songName: 'Photograph',
      songArtist: 'Ed Sheeran',
      poster: 'assets/images/28.jpg',
    },
    {
      id: '29',
      songName: 'Perfect',
      songArtist: 'Ed Sheeran',
      poster: 'assets/images/29.jpg',
    },
    {
      id: '30',
      songName: 'A Thousand Years',
      songArtist: 'Christina Perri',
      poster: 'assets/images/30.jpg',
    },
    {
      id: '31',
      songName: 'Psycho',
      songArtist: 'Red Velvet',
      poster: 'assets/images/31.jpg',
    },
    {
      id: '32',
      songName: 'YOUTH',
      songArtist: 'Troye Sivan',
      poster: 'assets/images/32.jpg',
    },
    {
      id: '33',
      songName: 'Dandelions',
      songArtist: 'Ruth B.',
      poster: 'assets/images/33.jpg',
    },
    {
      id: '34',
      songName: 'Polaroid Love',
      songArtist: 'ENHYPEN',
      poster: 'assets/images/34.jpg',
    },
    {
      id: '35',
      songName: '다라리(DARARI)',
      songArtist: 'TREASURE',
      poster: 'assets/images/35.jpg',
    },
    {
      id: '36',
      songName: 'Weekend',
      songArtist: 'TAEYEON',
      poster: 'assets/images/36.jpg',
    },
    {
      id: '37',
      songName: 'Blueming',
      songArtist: 'IU',
      poster: 'assets/images/37.jpg',
    },
    {
      id: '38',
      songName: 'Day 1 ◑',
      songArtist: 'HONNE',
      poster: 'assets/images/38.jpg',
    },
    {
      id: '39',
      songName: 'I Like Me Better',
      songArtist: 'Lauv',
      poster: 'assets/images/39.jpg',
    },
    {
      id: '40',
      songName: 'I Loved You',
      songArtist: 'DAY6 (데이식스)',
      poster: 'assets/images/40.jpg',
    },
    {
      id: '41',
      songName: 'Lavender Haze',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/41.jpg',
    },
    {
      id: '42',
      songName: 'Maroon',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/42.jpg',
    },
    {
      id: '43',
      songName: 'Anti-Hero',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/43.jpg',
    },
    {
      id: '44',
      songName: 'Snow On The Beach',
      songArtist: 'Taylor Swift ft.Lana',
      poster: 'assets/images/44.jpg',
    },
    {
      id: '45',
      songName: 'You\'re On Your Own, Kid',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/45.jpg',
    },
    {
      id: '46',
      songName: 'Midnight Rain',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/46.jpg',
    },
    {
      id: '47',
      songName: 'Question...?',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/47.jpg',
    },
    {
      id: '48',
      songName: 'Vigilante Shit',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/48.jpg',
    },
    {
      id: '49',
      songName: 'Bejeweled',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/49.jpg',
    },
    {
      id: '50',
      songName: 'Labyrinth',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/50.jpg',
    },
    {
      id: '51',
      songName: 'Karma',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/51.jpg',
    },
    {
      id: '52',
      songName: 'Sweet Noting',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/52.jpg',
    },
    {
      id: '53',
      songName: 'Mastermind',
      songArtist: 'Taylor Swift',
      poster: 'assets/images/53.jpg',
    },
    {
      id: '54',
      songName: 'Sushi Restaurant',
      songArtist: 'Harry Styles',
      poster: 'assets/images/54.jpg',
    },
    {
      id: '55',
      songName: 'Late Night Talking',
      songArtist: 'Harry Styles',
      poster: 'assets/images/55.jpg',
    },
    {
      id: '56',
      songName: 'Grapejuice',
      songArtist: 'Harry Styles',
      poster: 'assets/images/56.jpg',
    },
    {
      id: '57',
      songName: 'As It Was',
      songArtist: 'Harry Styles',
      poster: 'assets/images/57.jpg',
    },
    {
      id: '58',
      songName: 'Daylight',
      songArtist: 'Harry Styles',
      poster: 'assets/images/58.jpg',
    },
    {
      id: '59',
      songName: 'Little Freak',
      songArtist: 'Harry Styles',
      poster: 'assets/images/59.jpg',
    },
    {
      id: '60',
      songName: 'Matilda',
      songArtist: 'Harry Styles',
      poster: 'assets/images/60.jpg',
    },
    {
      id: '61',
      songName: 'Cinema',
      songArtist: 'Harry Styles',
      poster: 'assets/images/61.jpg',
    },
    {
      id: '62',
      songName: 'Daydreaming',
      songArtist: 'Harry Styles',
      poster: 'assets/images/62.jpg',
    },
    {
      id: '63',
      songName: 'Keep Driving',
      songArtist: 'Harry Styles',
      poster: 'assets/images/63.jpg',
    },
    {
      id: '64',
      songName: 'Satellite',
      songArtist: 'Harry Styles',
      poster: 'assets/images/64.jpg',
    },
    {
      id: '65',
      songName: 'Boyfriends',
      poster: 'assets/images/65.jpg',
    },
    {
      id: '66',
      songName: 'Love Of My Life',
      songArtist: 'Harry Styles',
      poster: 'assets/images/66.jpg',
    },
    {
      id: '67',
      songName: 'shut up',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/67.jpg',
    },
    {
      id: '68',
      songName: '34+35',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/67.jpg',
    },
    {
      id: '69',
      songName: 'motive',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/69.jpg',
    },
    {
      id: '70',
      songName: 'just like magic',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/70.jpg',
    },
    {
      id: '71',
      songName: 'off the table',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/71.jpg',
    },
    {
      id: '72',
      songName: 'six thirty',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/72.jpg',
    },
    {
      id: '73',
      songName: 'safety net',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/73.jpg',
    },
    {
      id: '74',
      songName: 'my hair',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/74.jpg',
    },
    {
      id: '75',
      songName: 'nasty',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/75.jpg',
    },
    {
      id: '76',
      songName: 'west side',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/76.jpg',
    },
    {
      id: '77',
      songName: 'love language',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/77.jpg',
    },
    {
      id: '78',
      songName: 'position',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/78.jpg',
    },
    {
      id: '79',
      songName: 'obvious',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/79.jpg',
    },
    {
      id: '80',
      songName: 'pov',
      songArtist: 'Ariana Grande',
      poster: 'assets/images/80.jpg',
    },
    {
      id: '81',
      songName: 'How You Like That',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/81.jpg',
    },
    {
      id: '82',
      songName: 'Ice Cream',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/82.jpg',
    },
    {
      id: '83',
      songName: 'Pretty Savage',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/83.jpg',
    },
    {
      id: '84',
      songName: 'Bet you Wanna',
      songArtist: 'BLACKPINK ft.Cardi B',
      poster: 'assets/images/84.jpg',
    },
    {
      id: '85',
      songName: 'Lovesick Girls',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/85.jpg',
    },
    {
      id: '86',
      songName: 'Crazy Over You',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/86.jpg',
    },
    {
      id: '87',
      songName: 'Love To Hate Me',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/87.jpg',
    },
    {
      id: '88',
      songName: 'You Never Know',
      songArtist: 'BLACKPINK',
      poster: 'assets/images/88.jpg',
    },
    {
      id: '89',
      songName: 'The Morning',
      songArtist: 'The Weekend',
      poster: 'assets/images/89.jpg',
    },
    {
      id: '90',
      songName: 'Die For You',
      songArtist: 'The Weekend',
      poster: 'assets/images/90.jpg',
    },
    {
      id: '91',
      songName: 'Acquainted',
      songArtist: 'The Weekend',
      poster: 'assets/images/91.jpg',
    },
    {
      id: '92',
      songName: 'Save Your Tears',
      songArtist: 'The Weekend',
      poster: 'assets/images/92.jpg',
    },
    {
      id: '93',
      songName: 'Blinding Lights',
      songArtist: 'The Weekend',
      poster: 'assets/images/93.jpg',
    },
    {
      id: '94',
      songName: 'In Your Eyes',
      songArtist: 'The Weekend',
      poster: 'assets/images/94.jpg',
    },
    {
      id: '95',
      songName: 'Can\'t Feel My Face',
      songArtist: 'The Weekend',
      poster: 'assets/images/95.jpg',
    },
    {
      id: '96',
      songName: 'I Feel It Coming',
      songArtist: 'The Weekend',
      poster: 'assets/images/96.jpg',
    },
    {
      id: '97',
      songName: 'Starboy',
      songArtist: 'The Weekend',
      poster: 'assets/images/97.jpg',
    },
    {
      id: '98',
      songName: 'Pray For Me',
      songArtist: 'The Weekend',
      poster: 'assets/images/98.jpg',
    },
    {
      id: '99',
      songName: 'Heartless',
      songArtist: 'The Weekend',
      poster: 'assets/images/99.jpg',
    },
    {
      id: '100',
      songName: 'Often',
      songArtist: 'The Weekend',
      poster: 'assets/images/100.jpg',
    },
    {
      id: '101',
      songName: 'The Hills',
      songArtist: 'The Weekend',
      poster: 'assets/images/101.jpg',
    },
    {
      id: '102',
      songName: 'Call Out My Name',
      songArtist: 'The Weekend',
      poster: 'assets/images/102.jpg',
    },
    {
      id: '103',
      songName: 'Earned It',
      songArtist: 'The Weekend',
      poster: 'assets/images/103.jpg',
    },
    {
      id: '104',
      songName: 'Love Me Harder',
      songArtist: 'The Weekend',
      poster: 'assets/images/104.jpg',
    },
    {
      id: '105',
      songName: 'Wicked Games',
      songArtist: 'The Weekend',
      poster: 'assets/images/91.jpg',
    },
    {
      id: '106',
      songName: 'After Hours',
      songArtist: 'The Weekend',
      poster: 'assets/images/106.jpg',
    },
    {
      id: '107',
      songName: 'Woman',
      songArtist: 'Doja Cat',
      poster: 'assets/images/107.jpg',
    },
    {
      id: '108',
      songName: 'Naked',
      songArtist: 'Doja Cat',
      poster: 'assets/images/108.jpg',
    },
    {
      id: '109',
      songName: 'PayDay',
      songArtist: 'Doja Cat ft.Young Thug',
      poster: 'assets/images/109.jpg',
    },
    {
      id: '110',
      songName: 'Get Into It',
      songArtist: 'Doja Cat',
      poster: 'assets/images/110.jpg',
    },
    {
      id: '111',
      songName: 'Need To Know',
      songArtist: 'Doja Cat',
      poster: 'assets/images/111.jpg',
    },
    {
      id: '112',
      songName: 'I Don\'t Do Drugs',
      songArtist: 'Doja Cat',
      poster: 'assets/images/112.jpg',
    },
    {
      id: '113',
      songName: 'Love To Dream',
      songArtist: 'Doja Cat',
      poster: 'assets/images/113.jpg',
    },
    {
      id: '114',
      songName: 'You Right',
      songArtist: 'Doja Cat',
      poster: 'assets/images/114.jpg',
    },
    {
      id: '115',
      songName: 'Been Like This',
      songArtist: 'Doja Cat',
      poster: 'assets/images/115.jpg',
    },
    {
      id: '116',
      songName: 'Option',
      songArtist: 'Doja Cat ft.JID',
      poster: 'assets/images/116.jpg',
    },
    {
      id: '117',
      songName: 'Aint\'t Shit',
      songArtist: 'Doja Cat',
      poster: 'assets/images/107.jpg',
    },
    {
      id: '118',
      songName: 'Imagine',
      songArtist: 'Doja Cat',
      poster: 'assets/images/118.jpg',
    },
    {
      id: '119',
      songName: 'Alone',
      songArtist: 'Doja Cat',
      poster: 'assets/images/119.jpg',
    },
    {
      id: '120',
      songName: 'Kiss Me More',
      songArtist: 'Doja Cat',
      poster: 'assets/images/120.jpg',
    },
    {
      id: '121',
      songName: 'brutal',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/121.jpg',
    },
    {
      id: '122',
      songName: 'traitor',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/122.jpg',
    },
    {
      id: '123',
      songName: 'drivers license',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/123.jpg',
    },
    {
      id: '124',
      songName: '1 step forward, 3 steps',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/124.jpg',
    },
    {
      id: '125',
      songName: 'deja vu',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/125.jpg',
    },
    {
      id: '126',
      songName: 'good 4 u',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/126.jpg',
    },
    {
      id: '127',
      songName: 'enough for you',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/127.jpg',
    },
    {
      id: '128',
      songName: 'happier',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/128.jpg',
    },
    {
      id: '129',
      songName: 'jealousy, jealousy',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/129.jpg',
    },
    {
      id: '130',
      songName: 'favorite crime',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/130.jpg',
    },
    {
      id: '131',
      songName: 'hope ur ok',
      songArtist: 'Olivia Rodrigo',
      poster: 'assets/images/131.jpg',
    },
    {
      id: '132',
      songName: 'เพื่อนเล่น ไม่เล่นเพื่อน',
      songArtist: 'Tilly Birds ft. MILLI',
      poster: 'assets/images/132.jpg',
    },
    {
      id: '133',
      songName: 'ลู่วิ่ง',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/133.jpg',
    },
    {
      id: '134',
      songName: 'เบื่อคนขี้เบื่อ',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/134.jpg',
    },
    {
      id: '135',
      songName: 'เดอะแบก',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/135.jpg',
    },
    {
      id: '136',
      songName: 'ติดตรงที่ฉัน',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/136.jpg',
    },
    {
      id: '137',
      songName: 'ขอให้เธอโชคดี',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/137.jpg',
    },
    {
      id: '138',
      songName: 'เธอไม่ได้อยู่คนเดียว',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/138.jpg',
    },
    {
      id: '139',
      songName: 'ถ้าเราเจอกันอีก',
      songArtist: 'Tilly Birds',
      poster: 'assets/images/139.jpg',
    },
    {
      id: '140',
      songName: 'HELLO',
      songArtist: 'TREASURE',
      poster: 'assets/images/140.jpg',
    },
    {
      id: '141',
      songName: 'VILKNO',
      songArtist: 'TREASURE',
      poster: 'assets/images/141.jpg',
    },
    {
      id: '142',
      songName: 'CLAP!',
      songArtist: 'TREASURE',
      poster: 'assets/images/142.jpg',
    },
    {
      id: '143',
      songName: 'THANK YOU',
      songArtist: 'TREASURE',
      poster: 'assets/images/143.jpg',
    },
    {
      id: '144',
      songName: 'HOLD IT IN',
      songArtist: 'TREASURE',
      poster: 'assets/images/144.jpg',
    },
    {
      id: '145',
      songName: 'Glimpse',
      songArtist: 'Joji',
      poster: 'assets/images/145.jpg',
    },
    {
      id: '146',
      songName: 'Feeling Like The End',
      songArtist: 'Joji',
      poster: 'assets/images/146.jpg',
    },
    {
      id: '146',
      songName: 'Feeling Like The End',
      songArtist: 'Joji',
      poster: 'assets/images/146.jpg',
    },
    {
      id: '147',
      songName: 'Before The Day Is Over',
      songArtist: 'Joji',
      poster: 'assets/images/147.jpg',
    },
    {
      id: '148',
      songName: 'Dissolve',
      songArtist: 'Joji',
      poster: 'assets/images/148.jpg',
    },
    {
      id: '149',
      songName: 'NIGHT RIDER',
      songArtist: 'Joji',
      poster: 'assets/images/149.jpg',
    },
    {
      id: '150',
      songName: 'BLAHBLAHBLAH DEMO',
      songArtist: 'Joji',
      poster: 'assets/images/150.jpg',
    },
    {
      id: '151',
      songName: 'YUKON (INTERLUDE)',
      songArtist: 'Joji',
      poster: 'assets/images/151.jpg',
    },
    {
      id: '152',
      songName: '1AM FREESTYLE',
      songArtist: 'Joji',
      poster: 'assets/images/152.jpg',
    },
    /*.......New Song........*/
  ];

let masterPlay = document.getElementById('play');

masterPlay.addEventListener('click', ()=>{
    if(music.paused || music.currentTime <=0) {
        music.play();
        masterPlay.classList.remove('fa-play');
        masterPlay.classList.add('fa-pause');
    } else {
        music.pause();
        masterPlay.classList.add('fa-play');
        masterPlay.classList.remove('fa-pause');
    }
})

const makeAllPlays = () => {
  Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
      element.classList.add('bi-play-circle');
      element.classList.remove('bi-pause-circle');
  })
}

// const makeAllBackgrounds = () => {
//   Array.from(document.getElementsByClassName('songItem')).forEach((element)=>{
//       element.style.background = "#fff";
//   })
// }
let index = 0;
let cover = document.getElementById('cover');
let title = document.getElementById('title');

Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
  element.addEventListener('click', (e)=>{
    index = e.target.id;
    makeAllPlays();
    e.target.classList.remove('bi-play-circle');
    e.target.classList.add('bi-pause-circle');
    music.src = `assets/music/${index}.mp3`;
    cover.src = `assets/images/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
      return ele.id == index;
    })

    song_title.forEach(ele => {
      let {songName} = ele;
      title.innerHTML = songName;
    })


    let song_artist = songs.filter((ele)=>{
      return ele.id == index;
    })

    song_artist.forEach(ele => {
      let {songArtist} = ele;
      artist.innerHTML = songArtist;
    })
    masterPlay.classList.remove('fa-play');
    masterPlay.classList.add('fa-pause');
    music.addEventListener('ended',()=>{
        masterPlay.classList.add('fa-play');
        masterPlay.classList.remove('fa-pause');
    })
    // makeAllBackgrounds();
    // Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, 0)";

  })
})

let currentStart = document.getElementById('timer');
let currentEnd = document.getElementById('duration');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];

music.addEventListener('timeupdate', ()=>{
  let music_curr = music.currentTime;
  let music_dur = music.duration;
  
  let min = Math.floor(music_dur/60);
  let sec = Math.floor(music_dur%60);

  if(sec<10){
    sec = `0${sec}`
  }
  currentEnd.innerHTML = `${min}:${sec}`;

  let min1 = Math.floor(music_curr/60);
  let sec1 = Math.floor(music_curr%60);

  if(sec1<10){
    sec1 = `0${sec1}`
  }
  currentStart.innerHTML = `${min1}:${sec1}`;

  let progressbar = parseInt((music.currentTime/music.duration)*100);
  seek.value = progressbar;
  let seekbar = seek.value;
  bar2.style.width = `${seekbar}%`;
  dot.style.left = `${seekbar}%`;
})

seek.addEventListener('change', ()=>{
  music.currentTime = seek.value * (music.duration/100);
})

music.addEventListener('ended', ()=>{
    masterPlay.classList.add('fa-play');
    masterPlay.classList.remove('fa-pause');
})

let back = document.getElementById('prev');
let next = document.getElementById('next');

back.addEventListener('click', ()=>{
  index -= 1;
  if(index < 1) {
    index = Array.from(document.getElementsByClassName('songItem')).length;
  }
  music.src = `assets/music/${index}.mp3`;
  cover.src = `assets/images/${index}.jpg`;
  music.play();
  let song_title = songs.filter((ele)=>{
    return ele.id == index;
  })

  song_title.forEach(ele => {
    let {songName} = ele;
    title.innerHTML = songName;
  })


  let song_artist = songs.filter((ele)=>{
    return ele.id == index;
  })

  song_artist.forEach(ele => {
    let {songArtist} = ele;
    artist.innerHTML = songArtist;
  })
  makeAllPlays();
  Array.from(document.getElementsByClassName('playListPlay'))[`${index}`].classList.remove('bi-play-circle');
  Array.from(document.getElementsByClassName('playListPlay'))[`${index}`].classList.add('bi-pause-circle');
  
  // makeAllBackgrounds();
  // Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, .1)";
  // (document.getElementsByClassName('songItem'))[`${index}`]
})

next.addEventListener('click', ()=>{
  index -= 0;
  index += 1;
  if(index > Array.from(document.getElementsByClassName('songItem')).length) {
    index = 1;
  }
  music.src = `assets/music/${index}.mp3`;
  cover.src = `assets/images/${index}.jpg`;
  music.play();
  let song_title = songs.filter((ele)=>{
    return ele.id == index;
  })

  song_title.forEach(ele => {
    let {songName} = ele;
    title.innerHTML = songName;
  })


  let song_artist = songs.filter((ele)=>{
    return ele.id == index;
  })

  song_artist.forEach(ele => {
    let {songArtist} = ele;
    artist.innerHTML = songArtist;
  })
  makeAllPlays();

  Array.from(document.getElementsByClassName('playListPlay'))[`${index}`].classList.remove('bi-play-circle');
  Array.from(document.getElementsByClassName('playListPlay'))[`${index}`].classList.add('bi-pause-circle');
  // makeAllBackgrounds();
  // Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, .1)";
})

