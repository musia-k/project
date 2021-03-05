-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2021 at 05:49 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default_team3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `picturename` varchar(25) NOT NULL,
  `featurename` varchar(25) NOT NULL,
  `picturepath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `featurepath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `additional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `type`, `category`, `picturename`, `featurename`, `picturepath`, `featurepath`, `price`, `timestamp`, `additional`) VALUES
(1, 'Skoda Fabia', '1.4 / Gasoline / Mechanic', 'ECONOM', 'skoda-fabia.jpg', 'Picture1.png', '../uploads/skoda-fabia.jpg', '../uploads/Picture1.png', 18, '2021-02-12 18:55:25', 'Maneuverable, compact and economical hatchback of the budget class is an excellent car for rent for residents and guests of Helsinki. It will be suitable for couples, young girls and guys, who appreciate small size and good driving qualities. Average fuel consumption - about 5.9 liters per 100 kilometers, the classic manual gearbox will be comfortable for many drivers.'),
(2, 'Hyundai Accent', '1.4 / Gasoline / Auto', 'ECONOM', 'hyundai-accent.jpg', 'Picture2.png', '../uploads/hyundai-accent.jpg', '../uploads/Picture2.png', 22, '2021-02-13 09:54:20', 'The car justifies expectations by all 100% - dynamic, well controlled, attracts the eyes of passersby. An excellent option for summer trips. I think the fact that the car is an automatic is a huge plus. You can feel at ease :)'),
(3, 'Suzuki Vitara', '1.4 / Gasoline / Auto', 'SUV', 'grand-vitara.jpg', 'Picture3.png', '../uploads/grand-vitara.jpg', '../uploads/Picture3.png', 18, '2021-02-13 09:55:17', 'The compact crossover with all-wheel drive and decent ground clearance, laconic but functional design is designed for comfortable driving in the dense city traffic. Moreover, it is popular for renting this car in Dnepr among those, who goes on journeys around our country. Due to the reduced weight the car is easy to feel and drive, enters the curves well and responds to the slightest movement of the steering wheel. '),
(4, 'Citroen C-Elysee', '1.6/ Gasoline / Auto', 'ECONOM', 'citroen-elyssee.jpg', 'Picture4.png', '../uploads/citroen-elyssee.jpg', '../uploads/Picture4.png', 24, '2021-02-13 15:58:41', 'The energy-efficient suspension gives the SUV a firm, reliable and confident ride, allowing passengers to feel no bumps in the road. The volume of the luggage compartment is 375 liters, which can be increased to 1,120 by folding the rear seats and removing the lid of the pencil box. This is enough for most household needs. If you need to rent a pleasant to drive, economical car in Helsinki, the Citroen C-Elysee is an excellent choice. '),
(5, 'Hyundai Elantra 2019', '1.6 / Gasoline / Auto', 'ECONOM', '2019-hyundai-elantra.jpg', 'Picture5.png', '../uploads/2019-hyundai-elantra.jpg', '../uploads/Picture5.png', 24, '2021-02-16 13:23:28', 'The 2019 Hyundai Elantra finishes in the bottom half of our highly competitive compact car rankings. It has lots of cargo space and available features, but it lacks the level of driver engagement that many rivals possess.'),
(6, 'Toyota RAV 4', '2.0 / Gasoline / Auto', 'SUV', 'Toyota RAV 4.jpg', 'Picture6.png', '../uploads/Toyota RAV 4.jpg', '../uploads/Picture6.png', 57, '2021-02-16 17:21:58', 'From spartan to swanky to outdoorsy, the 2021 Toyota RAV4 offers something for almost everyone. The base LE covers the economical end of the spectrum while the well-equipped Limited and TRD Off-Road models offer impressive amounts of equipment aimed at two very different types of buyers. No matter which trim you choose, the RAV4 comes with a 2.5-liter four-cylinder engine and an eight-speed automatic.'),
(7, 'Kia Sportage', '1.6 / Gasoline / Auto', 'SUV', '2016-kia-sportage.jpeg', 'Picture7.png', '../uploads/2016-kia-sportage.jpeg', '../uploads/Picture7.png', 89, '2021-02-16 17:26:27', 'The Sportage LX, S, and EX trims come with a 181-horsepower 2.4-liter four-cylinder engine. ... Shoppers who want something more brisk will have to opt for the top-of-the-line SX Turbo trim, which boasts a 240-horsepower turbocharged 2.0-liter four-cylinder engine.'),
(8, 'Audi TT Cabrio', '2.0 / Gasoline / Auto', 'CONVERTIBLE', 'Audi TT Cabrio.jpg', 'Picture8.png', '../uploads/Audi TT Cabrio.jpg', '../uploads/Picture8.png', 90, '2021-02-16 17:31:49', 'Despite doing away with the hatch and rear seats, the Roadster is 90kg heavier than the coupe. The fabric roof accounts for 39kg of that, extra body stiffening the rest. All electric, it takes just 10secs to raise or lower, at up to 31mph. When lowered an electric mesh screen rises to combat turbulence.'),
(9, 'Hyundai Solaris', '1.6 / Gasoline / Auto', 'ECONOM', 'hyundai_solaris_1.jpg', 'Picture9.png', '../uploads/hyundai_solaris_1.jpg', '../uploads/Picture9.png', 27, '2021-02-16 17:35:06', 'This Solaris is the first to have artificial leather seats (although the related Kia Rio has had this option for a long time), red inserts on the door upholstery and red stitching on the steering wheel and automatic selector. It also has LED taillights, and the side turn signal indicators moved from the fenders to the mirror housings, which, in turn, now have electric folding.'),
(10, 'Ford Fiesta Sedan', '1.6 / Gasoline / Auto', 'ECONOM', 'Ford Fiesta Sedan.jpg', 'Picture10.png', '../uploads/Ford Fiesta Sedan.jpg', '../uploads/Picture10.png', 27, '2021-02-16 17:37:26', 'As shown, 2020 EcoSport SES with the Black Appearance Package $27,775 MSRP; EPA-estimated rating of 23 city/29 hwy/25 combined mpg, 2.0L Ti- VCT Engine. Actual mileage will vary.\r\nTurn heads with style and comfort in the 2020 Ford EcoSport. With standard features like BLIS® with Cross-Traffic Alert and Rear View Camera, you can focus on the ride ahead. Keep the fun going with technology like the 4G LTE Wi-Fi hotspot and the available 10-speaker B&O Sound System by Bang & Olufsen.'),
(11, 'Volkswagen Polo', '1.4 / Gasoline / Auto', 'ECONOM', 'Volkswagen Polo.jpg', 'Picture11.png', '../uploads/Volkswagen Polo.jpg', '../uploads/Picture11.png', 29, '2021-02-18 15:13:39', 'The classic sedan is designed for the widest range of drivers. Its modest but presentable appearance pleases absolutely everyone: from businessmen to housewives. Ergonomic dashboard, simple and clear controls, comfortable seats - everything is designed for the comfort of the driver and passengers. The rear seat can accommodate three adults, if necessary, without much discomfort.'),
(12, 'Toyota Corolla E17', '1.6 / Gasoline / Auto', 'ECONOM', 'toyota corolla 2019.jpg', 'Picture12.png', '../uploads/toyota corolla 2019.jpg', '../uploads/Picture12.png', 35, '2021-02-18 15:15:53', 'Toyota has presented the European version of the 2014 Corolla sedan. The novelty has increased in size compared to its predecessor and got a variator instead of a four-speed automatic transmission. The car got a new grille, headlights and bumpers. In general, the sedan is made in the new corporate style and looks a bit like a hatchback Auris and crossover RAV4 of the new generation. rear seat can accommodate three adults, if necessary, without much discomfort.'),
(13, 'Hyundai Tucson', '2.0 / Gasoline / Auto', 'ECONOM', 'Hyundai Tucson.jpg', 'Picture13.png', '../uploads/Hyundai Tucson.jpg', '../uploads/Picture13.png', 57, '2021-02-18 15:17:53', 'Appearance of the model is refreshed due to a different, more massive design branded cascading radiator grille (instead of three horizontal bars in the previous Tucson now four), another pattern of headlights (with the design of the headlights in the form of the letter L; in addition, the optics can now be fully LED), redrawn bumper with a different version of the fog lights. As for the \"rear\", the restyled Tucson boasts a modified pattern of taillights, redesigned trunk lid, fog lights, located on the trunk lid and car body, as well as a different design of black and gray plastic protection.'),
(14, 'Mitsubishi Outlander', '2.0 / Gasoline / Auto', 'SUV', 'Mitsubishi Outlander.jpg', 'Picture14.png', '../uploads/Mitsubishi Outlander.jpg', '../uploads/Picture14.png', 57, '2021-02-18 15:19:33', 'The Mitsubishi Outlander (autˈlɑːndə) is a compact crossover produced by the Japanese Mitsubishi Corporation since 2001. Initially, when sales began in Japan, it was called the Mitsubishi Airtrek and was based on the Mitsubishi ASX concept car shown at the 2001 North American International Auto Show.'),
(15, 'Toyota Camry 70', '2.5 / Gasoline / Auto', 'BUSINESS', 'Toyota Camry 70.jpg', 'Picture15.png', '../uploads/Toyota Camry 70.jpg', '../uploads/Picture15.png', 60, '2021-02-18 15:22:12', 'The Toyota Camry is one of the most popular cars on the global market! Only in the United States of America Camry held the title of sales leader for 18 years - from 1997 to 2015, and in Australia the brainchild of Toyota and still more than twenty years is the best-selling car in the country. This large and comfortable sedan can be equipped with a 2, 2.5 or 3.5-liter engine. The most powerful version produces 249 horsepower and is able to accelerate an almost five-meter car to 100 km/h in just 7.1 seconds!'),
(16, 'Chery Tiggo 2', '1.5 / Gasoline / Auto', 'SUV', 'Chery Tiggo 2.jpg', 'Picture16.png', '../uploads/Chery Tiggo 2.jpg', '../uploads/Picture16.png', 31, '2021-02-18 15:24:55', 'Brilliant and sporty, powerful and reliable, subcompact crossover CHERY Tiggo 2 with ground clearance from 178 mm (for AT) is well suited for driving on our roads.\r\nWide functionality of the car available to drivers even in the basic configuration: airbags driver and passenger airbag, safety system (ABS + EBD), heated front seats, electric drive external mirrors, audio system, air conditioner.\r\nIn the more complete and expensive versions, the Chinese novelty receives a multimedia system with an 8-inch touchscreen display and support for Android Auto, as well as a rear view camera and Ecoshker armrest treatment.'),
(17, 'Nissan Rogue', '2.5 / Gasoline / Auto', 'SUV', 'Nissan Rogue.jpg', 'Picture17.png', '../uploads/Nissan Rogue.jpg', '../uploads/Picture17.png', 31, '2021-02-18 15:52:14', 'The Nissan Rogue is Nissan&#039;s compact crossover for the North American market, which debuted in January 2007. ... The second generation is already the counterpart of the third-generation Nissan X-Trail. In 2017, Nissan USA released the Rogue Sport, which is a reimagining of the second-generation Nissan Qashqai.'),
(18, 'Mini Countryman', '1.6 / Gasoline / Auto', 'SUV', 'Mini Countryman.jpg', 'Picture18.png', '../uploads/Mini Countryman.jpg', '../uploads/Picture18.png', 57, '2021-02-18 15:56:34', 'The Mini Countryman is a mini-crossover from the automaker Mini. The first Mini of this class and the first Mini with a five-door body under the auspices of BMW.'),
(19, 'Honda CRV', '1.5 / Gasoline / Auto', 'SUV', 'Honda CRV.jpg', 'Picture19.png', '../uploads/Honda CRV.jpg', '../uploads/Picture19.png', 57, '2021-02-18 15:57:24', 'The Honda CR-V is a compact crossover of the &quot;K1&quot; class. The official debut of the version for the North American market took place at the Los Angeles Auto Show in November 2016. The European version was presented to the general public at the Geneva Motor Show in March 2017.'),
(20, 'Volkswagen Passat 8', '1.8 / Gasoline / Auto', 'BUSINESS', 'Volkswagen Passat 8.jpg', 'Picture20.png', '../uploads/Volkswagen Passat 8.jpg', '../uploads/Picture20.png', 60, '2021-02-18 15:59:50', 'Volkswagen Passat (Volkswagen Passat) is a class &quot;D&quot; sedan. The world premiere of the eighth generation of the model took place at the Paris Motor Show in October 2014.\r\nVolkswagen designers are often scolded for their too conservative approach to the appearance of cars, but there is another category, which believes that there is nothing better than a calm &quot;long-playing&quot; design. Be that as it may, the Passat B8 easily gives away its affiliation with both the brand and the model, but at the same time it has changed completely. In fact, it carries none of the body details borrowed from the previous generation of the sedan.');

-- --------------------------------------------------------

--
-- Table structure for table `car_reviews`
--

CREATE TABLE `car_reviews` (
  `id` int NOT NULL,
  `review` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `car_id` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_reviews`
--

INSERT INTO `car_reviews` (`id`, `review`, `car_id`, `timestamp`) VALUES
(1, 'Was not the vehicle I had reserved but it was fine. 2500 vs 1500 truck', 1, '2021-02-18 17:27:00'),
(2, 'Wonderful car, comfortable, quiet suspension, good handling, I even think to buy myself one', 1, '2021-02-18 17:28:23'),
(3, 'Excellent economical car. Comfortable enough. Service at the highest level. The car is clean and in good condition.', 1, '2021-02-18 17:28:44'),
(5, 'Last week visited Helsinki .Thanks the company for a meeting at the airport and for the car. Car was new, very comfortable/ Everything was cool!', 2, '2021-02-18 17:29:56'),
(6, 'The car is new in 2016, comfortable and convenient. next time I will take a car from you, I liked everything.', 2, '2021-02-18 17:30:16'),
(7, 'Was able to book cheaper than other companies!', 2, '2021-02-18 17:30:36'),
(8, 'A good parkette. Very nice flow rate and high ground clearance. Keeps the cruise speed calmly. There is enough space in the luggage compartment. I would like to mention the seats separately. Very comfortable. Once I sat down and immediately realized that you can happily drive on them for long distances and easily 600-800 km a day to give. The only thing - a terrible Bluetooth connection scheme. Not intuitive and connects at times. Also, called the manager to help connect, the answer for 3 days renting and have not received.', 3, '2021-02-18 17:30:59'),
(9, 'Good car, really good car. A little bit expensive, i think comparing to prices in EU and Canada, but never mind. Runs and drives well as for 1.6 atmosphere. Managers are friendly. I wish they speak English a bit better, but anyway thanks a lot.', 3, '2021-02-18 17:31:20'),
(10, 'Booked this car with delivery to the address at an early time. Manager brought the car without delay. Ordered a child seat, which under the terms of the free, but was not available immediately. A few hours later returned the call and gave me a child safety seat. The car is convenient and comfortable. was clean and with a full tank, which I really needed, since I had to travel urgently and did not have time to stop for gas.', 4, '2021-02-18 17:31:40'),
(11, 'It is an excellent car for the city. In addition to the beautiful appearance, pleased with the expense and the availability of options - the rear view camera is very helpful when parking, very easy to connect the phone to the car. In general the service is satisfactory, I liked everything. A wish - increase the number of child seats for different ages, you always have them in short supply:)', 5, '2021-02-18 17:32:46'),
(12, 'That&#039;s what I didn&#039;t expect from the Elantra! The update has clearly benefited this car. And with a good configuration, the effect of driving pleasure is multiplied many times over. I advise you to take it and even just drive it for a couple of days, leaving your car in the garage. Believe me, it is worth it. Thanks to the guys for their help with the selection. You can trust this rental.', 5, '2021-02-18 17:33:02'),
(13, 'A comfortable car for any distance.', 6, '2021-02-18 17:33:21'),
(14, 'The car is very comfortable and economical for long trips, special thanks to the staff of RMR for the prompt service and punctual delivery of a car at a convenient for you address.', 6, '2021-02-18 17:33:38'),
(15, 'Took this car for a week, we were satisfied, good visibility, and wide adjustments of the driver&#039;s seat, which was very important for me as a driver. Ideal car, both for the city and for long distances. The car is very comfortable and economical for long trips, special thanks to the staff of RMR for the prompt service and punctual delivery of a car at a convenient for you address.', 7, '2021-02-18 17:33:54'),
(16, 'Hello, I want to thank the company for the high quality of service, comfortable and clean car. Thank you very much to the company, from now on if I need a car I will always order here.', 7, '2021-02-18 17:34:08'),
(17, 'The car justified expectations by all 100 - dynamic, well controlled, attracts the eyes of passersby. An excellent option for summer trips. I consider the fact that the car is manual a huge plus. You can feel yourself as a pilot:)', 8, '2021-02-18 17:34:30'),
(18, 'I&#039;ll leave my review. If the representatives of RMR are ready for criticism, then you are reading real criticism. So. Let&#039;s talk about the pluses: the consumption in the mixed cycle is 7.8 liters. The car is new, nothing rattles, starts with a bolt and drives. Manages to drive with confidence. As a whole the running characteristics have no caveats. But they are. We shall speak about it below. Yes, the car is quite spacious, the trunk is roomy. And now let&#039;s speak about disadvantages: a terribly clamped suspension, on bumps and wavy asphalt (which has floated from heat) is hell. If the driver on the seat begins to jump when driving on such bumps, the rear passengers are flying around the cabin. The seats are uncomfortable for long trips. So I would recommend this car for city driving. On the highway it has one more disadvantage - the light. It is no light, both low and high beam.', 9, '2021-02-18 17:34:48'),
(19, 'The car is beautiful. My family was satisfied. We will rent again! Thank you.', 9, '2021-02-18 17:35:02'),
(20, 'I rented a 2016 Hyundai Solaris - a great option! Rode around for a week. Thank you. This car is great.', 9, '2021-02-18 17:35:22'),
(21, 'Great car, very dynamic, the first time I drove a Fiesta with a trunk. I advise you to try this car.', 10, '2021-02-18 17:35:42'),
(22, 'Ordered a Fabia on the website. I was pleasantly surprised when I met the Fiesta! It&#039;s a nice car, fast. It&#039;s perfect for the city. Thanks to RMR!', 10, '2021-02-18 17:36:00'),
(23, 'We took it for a month. The car is nice and roomy. The service is at a high level. The communication with the representatives was pleasantly businesslike. Thank you! We will use your company next time.', 11, '2021-02-18 17:36:15'),
(24, 'Classic sedan Very much I liked the car!!! Economical fast frisky, for the city is the best, although I took it for a trip home!!!! will apply again thanks a lot for service!!!! all was very fast and high quality!!!!! On the level!!!! is designed for the widest range of drivers. Its modest but presentable appearance pleases absolutely everyone: from businessmen to housewives. Ergonomic dashboard, simple and clear controls, comfortable seats - everything is designed for the comfort of the driver and passengers. The rear seat can accommodate three adults, if necessary, without much discomfort.', 11, '2021-02-18 17:36:30'),
(25, 'Took this car for use in Helsinki, was satisfied. New car, for the middle class is quite comfortable, a lot of space in the back, a huge plus - flat floor, for children is very convenient. The guys work promptly and do a good discount, which is very nice. I am very satisfied with everything and thanks to the manager Alexander for his cooperation. We will use them again and recommend them to our friends.', 12, '2021-02-18 17:36:45'),
(26, 'Very successful model. Simple, no problems, reliable. The same car, which is just like created for our road conditions. This car is worthy only good reviews. And these are not empty words. Proven by many months. I categorically recommend it!', 13, '2021-02-18 17:36:59'),
(27, 'I was pleasantly surprised, very qualified employees, in a word, they know everything about cars. The car is in perfect condition, it was very pleasant to sit in the cabin. So, if you want impeccable service and a reliable car, then contact this car rental!', 13, '2021-02-18 17:37:24'),
(28, 'I rate five more for excellent service than for the car. Vitaly brought the car to the address at the specified time, all the time was in touch. In the car was waiting for me a set of &quot;all for you&quot; - water, tissues. Overall, the car is also not bad, but still not a full-fledged SUV. The clearance is high, but the all-wheel drive is not enough. To cut a long story short, I recommend RMR Cars to everyone who wants to rent a car, and the Outlander only to those who do not care about off-road characteristics.', 14, '2021-02-18 17:37:49'),
(29, 'Great car for the money', 15, '2021-02-18 17:38:03'),
(30, 'I don&#039;t think I will rent this car again, but I will definitely come back to RMR more than once. I have rented the Camry 55 three times before, which I was happy with 100 percent. With the advent of the 70, decided to give it a try.', 15, '2021-02-18 17:40:16'),
(31, 'Didn&#039;t like the car much. Not that it was bad, but in my opinion it was inferior to the previous generation in many criteria. The last Camry was better at 150+ speeds, had better noise isolation, and felt like a real business class. Japanese have economized a lot of things in the new car, and it is felt. Unfortunately, such tendency is present in all manufacturers, and there is nothing to do. It is difficult to make an overall assessment of the car, there are many little things that I did not like. But given the perfect condition of the car and service, which is always on high, my estimate - 5. P. S. Manager Ivan special thanks', 15, '2021-02-18 17:42:40'),
(32, 'Great car, happy with everything! Service is at the highest level.', 16, '2021-02-18 17:43:06'),
(33, 'Due to the circumstances, I had to turn to a rental company, because my car was under repair. I was satisfied both with the service of the company and the car itself. The car was quite comfortable, maneuverable and roomy.', 16, '2021-02-18 17:43:27'),
(34, 'Nissan Rogue is a great choice for big families and for thos who have a lot of lugagge. Huge trunk, 7 seats, a lot of space inside. And 22-25 mpg consumption in addition', 17, '2021-02-18 17:46:37'),
(35, 'I&#039;ve always wanted to drive this legendary car. It&#039;s beautiful! Thanks to RMR for this opportunity. I enjoyed it very much. I will definitely rent it more than once.', 18, '2021-02-18 17:46:51'),
(36, 'Mini Countryman - Not the first car I have rented, but it was the first time I used the services of  RMR and I was satisfied! Managers are very responsible for their work, it is evident that they work for the result and value their customers. It is nice to work with a leader in the market, they know what the customer wants. I recommend our Mini crossover. The first Mini of this class and the first Mini with a five-door body under the auspices of BMW.', 19, '2021-02-18 17:47:11'),
(37, 'Mini Countryman - Not the first car I have rented, but it was the first time I used the services of  RMR and I was satisfied! Managers are very responsible for their work, it is evident that they work for the result and value their customers. It is nice to work with a leader in the market, they know what the customer wants. I recommend our Mini crossover. The first Mini of this class and the first Mini with a five-door body under the auspices of BMW.', 20, '2021-02-18 17:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `webadmin`
--

CREATE TABLE `webadmin` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `webadmin`
--

INSERT INTO `webadmin` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'rama', 'p', '2021-02-11 10:54:45'),
(2, 'maryna', 'p', '2021-02-12 17:22:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_reviews`
--
ALTER TABLE `car_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_car_id` (`car_id`);

--
-- Indexes for table `webadmin`
--
ALTER TABLE `webadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car_reviews`
--
ALTER TABLE `car_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `webadmin`
--
ALTER TABLE `webadmin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_reviews`
--
ALTER TABLE `car_reviews`
  ADD CONSTRAINT `fk_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
