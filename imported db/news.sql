-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 12:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `header` text NOT NULL,
  `main_content` text NOT NULL,
  `picture1` text NOT NULL,
  `picture2` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `admin_id`, `header`, `main_content`, `picture1`, `picture2`, `created_at`, `updated_at`) VALUES
(1, 0, 'nt1modomdm', 'mtmpm6momo', '', '', '2017-03-18 18:30:35', '0000-00-00 00:00:00'),
(2, 1, 'unun7', 'ppp7', '', '', '2017-03-18 18:30:35', '0000-00-00 00:00:00'),
(3, 0, 'God is God', 'Timothy Motors wants to wish you a happy birthday Mr Timothy..\r\nsent by Shalom_Mee', 'Capture2.PNG', 'Nine Lives (2016) 1080p BluRay [Cyro.se].png', '2017-03-22 01:32:19', '2017-03-22 01:32:19'),
(4, 1, 'Parents that use Nanny Cams', 'Parents who use nanny cams to keep an eye on their kids have revealed the most bizarre things they’ve seen recorded.\r\n\r\nAlthough it’s nice to be safe in the knowledge that your eyes can be two places at once, sometimes, as these parents know, it can also be pretty strange.\r\n\r\nThe confessions range from creepy things they’ve heard, to odd things they’ve seen babysitters do. \r\n\r\nHere are eight of the best responses. \r\n\r\n1. “I saw me. I went into my son’s room to get him and said ‘Daddy’s here, don’t cry’. I went with him back to my room and heard my monitor say: ‘Here, don’t cry.’ Since my voice sounds so alien to me I freaked out and watched in horror as a tall man grabbed my baby and walked out. It took a second to realise I was holding him and it was me in the video, but I went through 10 years of grey hair in that second.”\r\n\r\n- ClassicCarLife.\r\n\r\n2. “Had it on one night and heard someone talking. It was some older lady talking about what it was like growing up in Africa. Weird as shit.”\r\n\r\n- armalitedan1.\r\n\r\n3. “Once caught the babysitter taking the baby’s blanket, putting it around her neck like a small cape, and ‘flying’ around the room with it on. Keep in mind, the baby could only see out of the crib and was not present for the show.”\r\n\r\n- gooblagoobla.\r\n\r\n4.  “There was a small hair or thread on the camera lens of the monitor and it looked like something moving under our son’s blanket. Very creepy.”\r\n\r\n- wuptedu. \r\n\r\n5. “My old roommate has two kids of his own. The older kid, three, deactivates the baby monitor cam when he and his sister want to do something they’ll get in trouble for. Kid even waves bye to the camera before he pulls the plug.”\r\n\r\n- Flynn_lives.\r\n\r\n6. “My niece would often talk and wave randomly to nothing, nobody thought it was odd until one day she was having a nap and we heard singing over the monitor, we thought it was probably picking up a radio signal but we went to check on her, as we got closer the lullaby got louder and it gave us the creeps. The sound stopped as soon as we opened the door, the video was interrupted once we walked in and went out of focus.”\r\n\r\n-themanwhatcan.\r\n\r\n7. “One of my co-workers used a nanny cam for all three of her babies. But on baby number three, the older two found out about it and started doing things like dancing or jumping around and making funny faces in front of it, or doing things like lining up the toys to face the camera.”\r\n\r\n- CrazyCoKids.\r\n\r\n8. “The babysitter would sniff the kids underwear after changing them.”\r\n\r\n - AsteroidMiner.', '58a6cbf1290000f616f27015.jpeg', '58a6d16c290000f616f2701e.jpeg', '2017-05-15 14:27:12', '0000-00-00 00:00:00'),
(5, 1, 'Pensioner’s Giant Cock Has Become A Tourist Attraction In Fife', 'A Scottish pensioner’s home has become a local tourist attraction after he erected a 14 foot (4.25 metre) cockerel in his front garden.\r\n\r\n73-year-old Jim Hughes pruned an ivy-covered tree into the shape of a male chicken outside his home in East Wemyss, and even added a beak and a comb to make it look even more cock-like.\r\n\r\n“Originally, it was an old cherry blossom tree,” Hughes told Fife Today. It got that big that I was worried it would be blown over and hit a car.”\r\n\r\n\r\n”It’s in the front garden and looks out into the street. Since then, quite a few people have been stopping to take photographs,” he added. “I call it Jock. And it’s crowing for independence.”\r\n\r\nJim isn’t the only keen horticulturalist making headlines with bizarre topiary.\r\n\r\nBack in February, tree surgeon Chris Bishop rose to fame after pruning an 18 foot (5.5 metre) tree on his property into a giant penis.\r\n\r\n\r\nWorcestershire resident Chris spent three years growing out the Cypress tree before he was able to trim it to look like a huge gentleman’s sausage.\r\n\r\nThe green-fingered 43-year-old told Caters: “No-one’s commented when I’ve been out in the garden, people have just looked at it and walked past. I think it’s because they’re trying to work out whether it’s just their dirty minds.”\r\n\r\nDespite protests from angry neighbours, Chris says he plans to grow the foliage out even more so he can add a pair of testicles to the sculpture.', '57ad89e8180000ad02bca5e0.jpeg', 'o-TREE-CHRIS-BISHOP-570.jpeg', '2017-05-15 14:30:22', '0000-00-00 00:00:00'),
(7, 1, '‘Saltbae’ Fan Gets Tattoo Of Everyone’s Favourite Butcher', 'Turkish butcher Nusret Gökçe, better known by his alter ego Saltbae, became an overnight sensation earlier this month thanks to his sassy cooking technique.\r\n\r\nNow, the Instagram star has been immortalised in a fan’s tattoo.\r\n\r\nFor those who missed it, a video of Saltbae’s cooking received more than eight million online views. Here it is in all its glory. \r\n\r\nMost of us were pretty mesmerised by Saltbae’s skills, but no one was quite as impressed as 24-year-old Jayden Davies.\r\n\r\nThe plumber, from Melbourne, has recently had a Saltbae portrait tattooed on his arm.\r\n\r\nSpeaking to BuzzFeed, Davies said he decided to get the tattoo after artist Mika Ryan asked his Facebook followers if anyone would like a Saltbae portrait.\r\n\r\n“So typical me, who does silly things, I messaged him and said ‘yes, I’ll do it,’” Davies said.\r\n\r\nHe added that the response to his tattoo has been pretty positive so far, with most people understanding “it’s all for a bit of a laugh”.\r\n\r\nIn other Saltbae-related news, the man himself has confirmed he plans to open two new restaurants in London and New York within the next few months.\r\n\r\n', 'Capture3.png', 'Capture3.png', '2017-05-15 14:35:21', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
