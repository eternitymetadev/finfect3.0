const banks = [
	{
		id: "2",
		name: "Abu Dhabi Commercial Bank"
	},
	{
		id: "3",
		name: "Aditya Birla Idea Payments Bank"
	},
	{
		id: "4",
		name: "Ahmedabad Mercantile Cooperative Bank"
	},
	{
		id: "5",
		name: "Ahmednagar Merchants Co-Op Bank Ltd"
	},
	{
		id: "6",
		name: "Airtel Payments Bank Limited"
	},
	{
		id: "7",
		name: "Akola Janata Commercial Cooperative Bank"
	},
	{
		id: "8",
		name: "Allahabad Bank"
	},
	{
		id: "9",
		name: "Almora Urban Cooperative Bank Limited"
	},
	{
		id: "10",
		name: "Ambarnath Jaihind Coop Bank Ltd Ambarnath"
	},
	{
		id: "11",
		name: "Andhra Bank"
	},
	{
		id: "12",
		name: "Andhra Pradesh Grameena Vikas Bank"
	},
	{
		id: "13",
		name: "Andhra Pragathi Grameena Bank"
	},
	{
		id: "14",
		name: "Apna Sahakari Bank Limited"
	},
	{
		id: "15",
		name: "Au Small Finance Bank Limited"
	},
	{
		id: "16",
		name: "Australia And New Zealand Banking Group Limited"
	},
	{
		id: "17",
		name: "Axis Bank"
	},
	{
		id: "18",
		name: "BNP Paribas"
	},
	{
		id: "19",
		name: "Bandhan Bank Limited"
	},
	{
		id: "20",
		name: "Bank Of America"
	},
	{
		id: "21",
		name: "Bank Of Baharain And Kuwait Bsc"
	},
	{
		id: "22",
		name: "Bank Of Baroda"
	},
	{
		id: "23",
		name: "Bank Of Ceylon"
	},
	{
		id: "24",
		name: "Bank Of India"
	},
	{
		id: "25",
		name: "Bank Of Maharashtra"
	},
	{
		id: "26",
		name: "Barclays Bank"
	},
	{
		id: "27",
		name: "Bassein Catholic Cooperative Bank Limited"
	},
	{
		id: "28",
		name: "Bhagini Nivedita Sahakari Bank Ltd Pune"
	},
	{
		id: "29",
		name: "Bharat Cooperative Bank Mumbai Limited"
	},
	{
		id: "30",
		name: "Canara Bank"
	},
	{
		id: "31",
		name: "Capital Small Finance Bank Limited"
	},
	{
		id: "32",
		name: "Central Bank Of India"
	},
	{
		id: "33",
		name: "Citi Bank"
	},
	{
		id: "34",
		name: "Citizen Credit Cooperative Bank Limited"
	},
	{
		id: "35",
		name: "City Union Bank Limited"
	},
	{
		id: "36",
		name: "Corporation Bank"
	},
	{
		id: "37",
		name: "Credit Agricole Corporate And Investment Bank Calyon Bank"
	},
	{
		id: "38",
		name: "Credit Suisee Ag"
	},
	{
		id: "39",
		name: "Csb Bank Limited"
	},
	{
		id: "40",
		name: "Ctbc Bank Co Ltd"
	},
	{
		id: "41",
		name: "Dbs Bank India Limited"
	},
	{
		id: "42",
		name: "Dcb Bank Limited"
	},
	{
		id: "43",
		name: "Dena Bank"
	},
	{
		id: "44",
		name: "Deogiri Nagari Sahakari Bank Ltd"
	},
	{
		id: "45",
		name: "Deposit Insurance And Credit Guarantee Corporation"
	},
	{
		id: "46",
		name: "Deustche Bank"
	},
	{
		id: "47",
		name: "Development Bank Of Singapore"
	},
	{
		id: "48",
		name: "Dhanalakshmi Bank"
	},
	{
		id: "49",
		name: "Dmk Jaoli Bank"
	},
	{
		id: "50",
		name: "Doha Bank"
	},
	{
		id: "51",
		name: "Doha Bank Qsc"
	},
	{
		id: "52",
		name: "Dombivli Nagari Sahakari Bank Limited"
	},
	{
		id: "53",
		name: "Durgapur Steel Peoples Co-Operative Bank Ltd"
	},
	{
		id: "54",
		name: "Emirates Nbd Bank P J S C"
	},
	{
		id: "55",
		name: "Equitas Small Finance Bank Limited"
	},
	{
		id: "56",
		name: "Esaf Small Finance Bank Limited"
	},
	{
		id: "57",
		name: "Export Import Bank Of India"
	},
	{
		id: "58",
		name: "Federal Bank"
	},
	{
		id: "59",
		name: "Fincare Small Finance Bank Ltd"
	},
	{
		id: "60",
		name: "Fino Payments Bank"
	},
	{
		id: "61",
		name: "First Abu Dhabi Bank Pjsc"
	},
	{
		id: "62",
		name: "Firstrand Bank Limited"
	},
	{
		id: "63",
		name: "G P Parsik Bank"
	},
	{
		id: "64",
		name: "Gs Mahanagar Co-Operative Bank Limited"
	},
	{
		id: "65",
		name: "Haryana State Cooperative Bank"
	},
	{
		id: "66",
		name: "Hdfc Bank"
	},
	{
		id: "67",
		name: "Himachal Pradesh State Cooperative Bank Ltd"
	},
	{
		id: "68",
		name: "Hsbc Bank"
	},
	{
		id: "69",
		name: "Icici Bank Limited"
	},
	{
		id: "70",
		name: "Idbi Bank"
	},
	{
		id: "71",
		name: "Idfc First Bank Ltd"
	},
	{
		id: "72",
		name: "Idrbt"
	},
	{
		id: "73",
		name: "Idukki District Co Operative Bank Ltd"
	},
	{
		id: "74",
		name: "India Post Payment Bank"
	},
	{
		id: "75",
		name: "Indian Bank"
	},
	{
		id: "76",
		name: "Indian Overseas Bank"
	},
	{
		id: "77",
		name: "Indusind Bank"
	},
	{
		id: "78",
		name: "Industrial And Commercial Bank Of China Limited"
	},
	{
		id: "79",
		name: "Industrial Bank Of Korea"
	},
	{
		id: "80",
		name: "Irinjalakuda Town Co-Operative Bank Ltd"
	},
	{
		id: "81",
		name: "Jalgaon Janata Sahakari Bank Limited"
	},
	{
		id: "82",
		name: "Jammu And Kashmir Bank Limited"
	},
	{
		id: "83",
		name: "Jana Small Finance Bank Ltd"
	},
	{
		id: "84",
		name: "Janakalyan Sahakari Bank Limited"
	},
	{
		id: "85",
		name: "Janaseva Sahakari Bank Borivli Limited"
	},
	{
		id: "86",
		name: "Janaseva Sahakari Bank Limited"
	},
	{
		id: "87",
		name: "Janata Sahakari Bank Limited"
	},
	{
		id: "88",
		name: "Jio Payments Bank Limited"
	},
	{
		id: "89",
		name: "Jp Morgan Bank"
	},
	{
		id: "90",
		name: "Kallappanna Awade Ichalkaranji Janata Sahakari Bank Limited"
	},
	{
		id: "91",
		name: "Kalupur Commercial Cooperative Bank"
	},
	{
		id: "92",
		name: "Kalyan Janata Sahakari Bank"
	},
	{
		id: "93",
		name: "Karnataka Bank Limited"
	},
	{
		id: "94",
		name: "Karnataka Vikas Grameena Bank"
	},
	{
		id: "95",
		name: "Karur Vysya Bank"
	},
	{
		id: "96",
		name: "Kaveri Grameena Bank"
	},
	{
		id: "97",
		name: "Keb Hana Bank"
	},
	{
		id: "98",
		name: "Kerala Gramin Bank"
	},
	{
		id: "99",
		name: "Kotak Mahindra Bank Limited"
	},
	{
		id: "100",
		name: "Kozhikode District Cooperatiave Bank Ltd"
	},
	{
		id: "101",
		name: "Krung Thai Bank Pcl"
	},
	{
		id: "102",
		name: "Laxmi Vilas Bank"
	},
	{
		id: "103",
		name: "Maharashtra Gramin Bank"
	},
	{
		id: "104",
		name: "Maharashtra State Cooperative Bank"
	},
	{
		id: "105",
		name: "Mahesh Sahakari Bank Ltd Pune"
	},
	{
		id: "106",
		name: "Mashreqbank Psc"
	},
	{
		id: "107",
		name: "Mizuho Bank Ltd"
	},
	{
		id: "108",
		name: "Mufg Bank"
	},
	{
		id: "109",
		name: "Nagar Urban Co Operative Bank"
	},
	{
		id: "110",
		name: "Nagpur Nagarik Sahakari Bank Limited"
	},
	{
		id: "111",
		name: "National Bank For Agriculture And Rural Development"
	},
	{
		id: "112",
		name: "Nav Jeevan Co Op Bank Ltd"
	},
	{
		id: "113",
		name: "New India Cooperative Bank Limited"
	},
	{
		id: "114",
		name: "Nkgsb Cooperative Bank Limited"
	},
	{
		id: "115",
		name: "North East Small Finance Bank Limited"
	},
	{
		id: "116",
		name: "Nsdl Payments Bank Limited"
	},
	{
		id: "117",
		name: "Nutan Nagarik Sahakari Bank Limited"
	},
	{
		id: "118",
		name: "Oriental Bank Of Commerce"
	},
	{
		id: "119",
		name: "Paytm Payments Bank Ltd"
	},
	{
		id: "120",
		name: "Pragathi Krishna Gramin Bank"
	},
	{
		id: "121",
		name: "Prime Cooperative Bank Limited"
	},
	{
		id: "122",
		name: "Pt Bank Maybank Indonesia Tbk"
	},
	{
		id: "123",
		name: "Punjab And Sind Bank"
	},
	{
		id: "124",
		name: "Punjab National Bank"
	},
	{
		id: "125",
		name: "Qatar National Bank Saq"
	},
	{
		id: "126",
		name: "Rabobank International"
	},
	{
		id: "127",
		name: "Rajarambapu Sahakari Bank Limited"
	},
	{
		id: "128",
		name: "Rajasthan Marudhara Gramin Bank"
	},
	{
		id: "129",
		name: "Rajgurunagar Sahakari Bank Limited"
	},
	{
		id: "130",
		name: "Rajkot Nagrik Sahakari Bank Limited"
	},
	{
		id: "131",
		name: "Rbi Pad"
	},
	{
		id: "132",
		name: "Rbl Bank Limited"
	},
	{
		id: "133",
		name: "Reserve Bank Of India"
	},
	{
		id: "134",
		name: "Reserve Bank Of India "
	},
	{
		id: "135",
		name: "Reserve Bank Of India"
	},
	{
		id: "136",
		name: "Reserve Bank Of India"
	},
	{
		id: "137",
		name: "Sahebrao Deshmukh Cooperative Bank Limited"
	},
	{
		id: "138",
		name: "Samarth Sahakari Bank Ltd"
	},
	{
		id: "139",
		name: "Sant Sopankaka Sahakari Bank Ltd"
	},
	{
		id: "140",
		name: "Saraspur Nagrik Co Operative Bank Ltd Saraspur"
	},
	{
		id: "141",
		name: "Saraswat Cooperative Bank Limited"
	},
	{
		id: "142",
		name: "Sber Bank"
	},
	{
		id: "143",
		name: "Sbm Bank India Limited"
	},
	{
		id: "144",
		name: "Shikshak Sahakari Bank Limited"
	},
	{
		id: "145",
		name: "Shinhan Bank"
	},
	{
		id: "146",
		name: "Shivalik Mercantile Co Operative Bank Ltd"
	},
	{
		id: "147",
		name: "Shri Chhatrapati Rajashri Shahu Urban Cooperative Bank Limited"
	},
	{
		id: "148",
		name: "Shri Veershaiv Co Op Bank Ltd"
	},
	{
		id: "149",
		name: "Sir M Visvesvaraya Co Operative Bank Ltd"
	},
	{
		id: "150",
		name: "Societe Generale"
	},
	{
		id: "151",
		name: "Solapur Janata Sahakari Bank Limited"
	},
	{
		id: "152",
		name: "South Indian Bank"
	},
	{
		id: "153",
		name: "Standard Chartered Bank"
	},
	{
		id: "154",
		name: "State Bank Of India"
	},
	{
		id: "155",
		name: "Sumitomo Mitsui Banking Corporation"
	},
	{
		id: "156",
		name: "Surat National Cooperative Bank Limited"
	},
	{
		id: "157",
		name: "Suryoday Small Finance Bank Limited"
	},
	{
		id: "158",
		name: "Sutex Cooperative Bank Limited"
	},
	{
		id: "159",
		name: "Syndicate Bank"
	},
	{
		id: "160",
		name: "Tamilnad Mercantile Bank Limited"
	},
	{
		id: "161",
		name: "Telangana State Coop Apex Bank"
	},
	{
		id: "162",
		name: "Textile Traders Co Operative Bank Ltd"
	},
	{
		id: "163",
		name: "Textile Traders Co-Operative Bank Limited"
	},
	{
		id: "164",
		name: "The A"
	},
	{
		id: "165",
		name: "The Akola District Central Cooperative Bank"
	},
	{
		id: "166",
		name: "The Andhra Pradesh State Cooperative Bank Limited"
	},
	{
		id: "167",
		name: "The Bank Of Nova Scotia"
	},
	{
		id: "168",
		name: "The Baramati Sahakari Bank Ltd"
	},
	{
		id: "169",
		name: "The Cosmos Co Operative Bank Limited"
	},
	{
		id: "170",
		name: "The Delhi State Cooperative Bank Limited"
	},
	{
		id: "171",
		name: "The Gadchiroli District Central Cooperative Bank Limited"
	},
	{
		id: "172",
		name: "The Greater Bombay Cooperative Bank Limited"
	},
	{
		id: "173",
		name: "The Gujarat State Cooperative Bank Limited"
	},
	{
		id: "174",
		name: "The Hasti Coop Bank Ltd"
	},
	{
		id: "175",
		name: "The Jalgaon Peopels Cooperative Bank Limited"
	},
	{
		id: "176",
		name: "The Kangra Central Cooperative Bank Limited"
	},
	{
		id: "177",
		name: "The Kangra Cooperative Bank Limited"
	},
	{
		id: "178",
		name: "The Karad Urban Cooperative Bank Limited"
	},
	{
		id: "179",
		name: "The Karanataka State Cooperative Apex Bank Limited"
	},
	{
		id: "180",
		name: "The Kerala State Co Operative Bank Ltd"
	},
	{
		id: "181",
		name: "The Kurmanchal Nagar Sahakari Bank Limited"
	},
	{
		id: "182",
		name: "The Malkapur Urban Co Operative Bank Ltd Malkapur"
	},
	{
		id: "183",
		name: "The Mehsana Urban Cooperative Bank"
	},
	{
		id: "184",
		name: "The Mumbai District Central Cooperative Bank Limited"
	},
	{
		id: "185",
		name: "The Municipal Cooperative Bank Limited"
	},
	{
		id: "186",
		name: "The Muslim Co-Operative Bank Ltd"
	},
	{
		id: "187",
		name: "The Nainital Bank Limited"
	},
	{
		id: "188",
		name: "The Nasik Merchants Cooperative Bank Limited"
	},
	{
		id: "189",
		name: "The Navnirman Co-Operative Bank Limited"
	},
	{
		id: "190",
		name: "The Nilambur Co Operative Urban Bank Ltd Nilambur"
	},
	{
		id: "191",
		name: "The Odisha State Cooperative Bank Ltd"
	},
	{
		id: "192",
		name: "The Pandharpur Urban Co Op"
	},
	{
		id: "193",
		name: "The Rajasthan State Cooperative Bank Limited"
	},
	{
		id: "194",
		name: "The Seva Vikas Cooperative Bank Limited"
	},
	{
		id: "195",
		name: "The Shamrao Vithal Cooperative Bank"
	},
	{
		id: "196",
		name: "The Sindhudurg District Centerial Co-Op Bank Ltd"
	},
	{
		id: "197",
		name: "The Sindhudurg District Central Coop Bank Ltd"
	},
	{
		id: "198",
		name: "The Surat District Cooperative Bank Limited"
	},
	{
		id: "199",
		name: "The Surath Peoples Cooperative Bank Limited"
	},
	{
		id: "200",
		name: "The Tamil Nadu State Apex Cooperative Bank"
	},
	{
		id: "201",
		name: "The Thane Bharat Sahakari Bank Limited"
	},
	{
		id: "202",
		name: "The Thane District Central Cooperative Bank Limited"
	},
	{
		id: "203",
		name: "The Urban Co Operative Bank Ltd No One Seven Five Eight Perinthalmanna"
	},
	{
		id: "204",
		name: "The Varachha Cooperative Bank Limited"
	},
	{
		id: "205",
		name: "The Vijay Co Operative Bank Limited"
	},
	{
		id: "206",
		name: "The Vishweshwar Sahakari Bank Limited"
	},
	{
		id: "207",
		name: "The West Bengal State Cooperative Bank"
	},
	{
		id: "208",
		name: "The Zoroastrian Cooperative Bank Limited"
	},
	{
		id: "209",
		name: "Thrissur District Co-Operative Bank Ltd"
	},
	{
		id: "210",
		name: "Tjsb Sahakari Bank Limited"
	},
	{
		id: "211",
		name: "Tjsb Sahakari Bank Ltd"
	},
	{
		id: "212",
		name: "Tumkur Grain Merchants Cooperative Bank Limited"
	},
	{
		id: "213",
		name: "Uco Bank"
	},
	{
		id: "214",
		name: "Ujjivan Small Finance Bank Limited"
	},
	{
		id: "215",
		name: "Union Bank Of India"
	},
	{
		id: "216",
		name: "United Bank Of India"
	},
	{
		id: "217",
		name: "United Overseas Bank Limited"
	},
	{
		id: "218",
		name: "Utkarsh Small Finance Bank"
	},
	{
		id: "219",
		name: "Uttar Pradesh Cooperative Bank Ltd"
	},
	{
		id: "220",
		name: "Vasai Janata Sahakari Bank Ltd"
	},
	{
		id: "221",
		name: "Vasai Vikas Sahakari Bank Limited"
	},
	{
		id: "222",
		name: "Vasai Vikas Sahakari Bank Ltd"
	},
	{
		id: "223",
		name: "Vijaya Bank"
	},
	{
		id: "224",
		name: "Westpac Banking Corporation"
	},
	{
		id: "225",
		name: "Woori Bank"
	},
	{
		id: "226",
		name: "Yes Bank"
	},
	{
		id: "227",
		name: "Zila Sahakri Bank Limited Ghaziabad"
	}
] 