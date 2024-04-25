-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Apr 2024 pada 09.21
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wb_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `page_visited` varchar(128) DEFAULT NULL,
  `visit_time` datetime DEFAULT NULL,
  `visitor_name` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `isp` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `ip_address`, `page_visited`, `visit_time`, `visitor_name`, `country`, `isp`) VALUES
(678, '::1', '', '2024-03-13 18:58:59', '', '-', 'Loopback'),
(679, '::1', 'auth', '2024-03-13 18:59:49', '', '-', 'Loopback'),
(680, '::1', 'dashboard', '2024-03-13 19:04:57', 'Paulus Christofel S', '-', 'Loopback'),
(681, '::1', 'dashboard', '2024-03-13 19:11:33', 'Paulus Christofel S', '-', 'Loopback'),
(682, '::1', 'dashboard', '2024-03-13 19:17:10', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(683, '::1', 'dashboard', '2024-03-13 19:17:12', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(684, '::1', 'dashboard', '2024-03-13 19:18:21', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(685, '::1', 'dashboard', '2024-03-13 19:18:23', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(686, '::1', '', '2024-04-24 12:19:41', '', '-', 'Loopback'),
(687, '::1', 'auth', '2024-04-24 12:19:51', '', '-', 'Loopback'),
(688, '::1', 'dashboard', '2024-04-24 12:19:52', 'Paulus Christofel S', '-', 'Loopback'),
(689, '::1', 'dashboard', '2024-04-24 13:12:52', 'Paulus Christofel S', '-', 'Loopback'),
(690, '::1', 'dashboard', '2024-04-24 13:17:51', 'Paulus Christofel S', '-', 'Loopback'),
(691, '::1', 'dashboard', '2024-04-24 13:23:26', 'Paulus Christofel S', '-', 'Loopback'),
(692, '::1', 'dashboard', '2024-04-24 13:24:07', 'Paulus Christofel S', '-', 'Loopback'),
(693, '::1', 'dashboard', '2024-04-24 13:39:32', 'Paulus Christofel S', '-', 'Loopback'),
(694, '::1', 'dashboard', '2024-04-24 13:41:58', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(695, '::1', 'dashboard', '2024-04-24 13:42:02', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(696, '::1', 'auth', '2024-04-24 13:42:38', '', 'Unknown', 'Unknown'),
(697, '::1', 'auth', '2024-04-24 13:42:47', '', 'Unknown', 'Unknown'),
(698, '::1', 'auth', '2024-04-24 13:42:48', '', 'Unknown', 'Unknown'),
(699, '::1', 'auth', '2024-04-24 13:42:56', '', 'Unknown', 'Unknown'),
(700, '::1', 'dashboard', '2024-04-24 13:42:56', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(701, '::1', 'dashboard', '2024-04-24 13:43:31', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(702, '::1', 'dashboard', '2024-04-24 13:43:40', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(703, '::1', 'dashboard', '2024-04-24 13:44:02', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(704, '::1', 'dashboard', '2024-04-24 13:44:07', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(705, '::1', 'dashboard', '2024-04-24 13:44:18', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(706, '::1', 'dashboard', '2024-04-24 13:46:32', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(707, '::1', 'dashboard', '2024-04-24 13:47:01', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(708, '::1', 'dashboard', '2024-04-24 13:47:02', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(709, '::1', 'dashboard', '2024-04-24 13:47:03', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(710, '::1', 'dashboard', '2024-04-24 13:47:19', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(711, '::1', 'dashboard', '2024-04-24 13:50:23', 'Paulus Christofel S', 'Unknown', 'Unknown'),
(712, '::1', 'dashboard', '2024-04-24 13:50:57', 'Paulus Christofel S', '-', 'Loopback'),
(713, '::1', 'dashboard', '2024-04-24 13:51:51', 'Paulus Christofel S', '-', 'Loopback'),
(714, '::1', 'dashboard', '2024-04-24 13:52:39', 'Paulus Christofel S', '-', 'Loopback'),
(715, '::1', 'dashboard', '2024-04-24 13:52:42', 'Paulus Christofel S', '-', 'Loopback'),
(716, '::1', 'dashboard', '2024-04-24 13:56:14', 'Paulus Christofel S', '-', 'Loopback'),
(717, '::1', 'dashboard', '2024-04-24 13:57:39', 'Paulus Christofel S', '-', 'Loopback'),
(718, '::1', 'dashboard', '2024-04-24 13:58:19', 'Paulus Christofel S', '-', 'Loopback'),
(719, '::1', 'dashboard', '2024-04-24 13:59:07', 'Paulus Christofel S', '-', 'Loopback'),
(720, '::1', 'dashboard', '2024-04-24 13:59:46', 'Paulus Christofel S', '-', 'Loopback'),
(721, '::1', 'dashboard', '2024-04-24 13:59:52', 'Paulus Christofel S', '-', 'Loopback'),
(722, '::1', 'auth/blocked', '2024-04-24 15:05:51', 'Paulus Christofel S', '-', 'Loopback'),
(723, '::1', 'auth', '2024-04-24 15:05:54', 'Paulus Christofel S', '-', 'Loopback'),
(724, '::1', 'auth', '2024-04-24 15:14:34', 'Paulus Christofel S', '-', 'Loopback'),
(725, '::1', 'auth/blocked', '2024-04-24 15:14:34', 'Paulus Christofel S', '-', 'Loopback'),
(726, '::1', 'auth/blocked', '2024-04-24 15:17:20', 'Paulus Christofel S', '-', 'Loopback'),
(727, '::1', 'auth', '2024-04-24 15:17:22', 'Paulus Christofel S', '-', 'Loopback'),
(728, '::1', 'auth', '2024-04-24 15:17:28', 'Paulus Christofel S', '-', 'Loopback'),
(729, '::1', 'dashboard', '2024-04-24 15:17:29', 'Paulus Christofel S', '-', 'Loopback'),
(730, '::1', 'dashboard', '2024-04-24 15:19:57', 'Paulus Christofel S', '-', 'Loopback'),
(731, '::1', 'auth/blocked', '2024-04-24 15:22:28', 'Paulus Christofel S', '-', 'Loopback'),
(732, '::1', 'auth', '2024-04-24 15:23:41', 'Paulus Christofel S', '-', 'Loopback'),
(733, '::1', 'auth', '2024-04-24 15:23:51', 'Paulus Christofel S', '-', 'Loopback'),
(734, '::1', 'dashboard', '2024-04-24 15:23:52', 'Paulus Christofel S', '-', 'Loopback'),
(735, '::1', 'auth/blocked', '2024-04-24 15:24:58', 'Paulus Christofel S', '-', 'Loopback'),
(736, '::1', 'auth', '2024-04-24 15:25:00', 'Paulus Christofel S', '-', 'Loopback'),
(737, '::1', 'auth', '2024-04-24 15:25:05', 'Paulus Christofel S', '-', 'Loopback'),
(738, '::1', 'auth/blocked', '2024-04-24 15:25:06', 'Paulus Christofel S', '-', 'Loopback'),
(739, '::1', 'auth', '2024-04-24 15:25:27', 'Paulus Christofel S', '-', 'Loopback'),
(740, '::1', 'auth', '2024-04-24 15:25:35', 'Paulus Christofel S', '-', 'Loopback'),
(741, '::1', 'auth/blocked', '2024-04-24 15:25:35', 'Paulus Christofel S', '-', 'Loopback'),
(742, '::1', 'auth', '2024-04-24 15:26:01', 'Paulus Christofel S', '-', 'Loopback'),
(743, '::1', 'auth', '2024-04-24 15:26:06', 'Paulus Christofel S', '-', 'Loopback'),
(744, '::1', 'dashboard', '2024-04-24 15:26:07', 'Paulus Christofel S', '-', 'Loopback'),
(745, '::1', 'dashboard', '2024-04-24 15:28:23', 'Paulus Christofel S', '-', 'Loopback'),
(746, '::1', 'dashboard', '2024-04-24 15:28:25', 'Paulus Christofel S', '-', 'Loopback'),
(747, '::1', 'auth/logout', '2024-04-24 15:28:27', 'Paulus Christofel S', '-', 'Loopback'),
(748, '::1', '', '2024-04-24 15:28:28', '', '-', 'Loopback'),
(749, '::1', 'auth', '2024-04-24 15:28:36', '', '-', 'Loopback'),
(750, '::1', 'dashboard', '2024-04-24 15:28:36', 'Paulus Christofel S', '-', 'Loopback'),
(751, '::1', 'auth', '2024-04-24 18:27:54', '', '-', 'Loopback'),
(752, '::1', 'auth', '2024-04-24 18:27:55', '', '-', 'Loopback'),
(753, '::1', 'auth', '2024-04-24 18:27:55', '', '-', 'Loopback'),
(754, '::1', 'auth', '2024-04-24 18:27:56', '', '-', 'Loopback'),
(755, '::1', 'auth', '2024-04-24 18:27:56', '', '-', 'Loopback'),
(756, '::1', 'auth', '2024-04-24 18:27:56', '', '-', 'Loopback'),
(757, '::1', 'auth', '2024-04-24 18:27:57', '', '-', 'Loopback'),
(758, '::1', 'auth', '2024-04-24 18:27:57', '', '-', 'Loopback'),
(759, '::1', 'auth', '2024-04-24 18:27:58', '', '-', 'Loopback'),
(760, '::1', 'auth', '2024-04-24 18:27:58', '', '-', 'Loopback'),
(761, '::1', 'auth', '2024-04-24 18:28:00', '', '-', 'Loopback'),
(762, '::1', 'auth', '2024-04-24 18:28:00', '', '-', 'Loopback'),
(763, '::1', 'auth', '2024-04-24 18:28:00', '', '-', 'Loopback'),
(764, '::1', 'auth', '2024-04-24 18:28:01', '', '-', 'Loopback'),
(765, '::1', 'auth', '2024-04-24 18:28:01', '', '-', 'Loopback'),
(766, '::1', 'auth', '2024-04-24 18:28:02', '', '-', 'Loopback'),
(767, '::1', 'auth', '2024-04-24 18:28:02', '', '-', 'Loopback'),
(768, '::1', 'auth', '2024-04-24 18:28:03', '', '-', 'Loopback'),
(769, '::1', 'auth', '2024-04-24 18:28:03', '', '-', 'Loopback'),
(770, '::1', 'auth', '2024-04-24 18:28:03', '', '-', 'Loopback'),
(771, '::1', 'auth', '2024-04-24 18:28:04', '', '-', 'Loopback'),
(772, '::1', 'auth', '2024-04-24 18:28:04', '', '-', 'Loopback'),
(773, '::1', 'auth', '2024-04-24 18:28:04', '', '-', 'Loopback'),
(774, '::1', 'auth', '2024-04-24 18:28:05', '', '-', 'Loopback'),
(775, '::1', 'auth', '2024-04-24 18:28:05', '', '-', 'Loopback'),
(776, '::1', '', '2024-04-24 18:28:07', '', '-', 'Loopback'),
(777, '::1', 'auth', '2024-04-24 18:28:07', '', '-', 'Loopback'),
(778, '::1', 'auth', '2024-04-24 18:28:08', '', '-', 'Loopback'),
(779, '::1', 'auth', '2024-04-24 18:28:08', '', '-', 'Loopback'),
(780, '::1', 'auth', '2024-04-24 18:28:09', '', '-', 'Loopback'),
(781, '::1', 'auth', '2024-04-24 18:28:09', '', '-', 'Loopback'),
(782, '::1', 'auth', '2024-04-24 18:28:09', '', '-', 'Loopback'),
(783, '::1', 'auth', '2024-04-24 18:28:10', '', '-', 'Loopback'),
(784, '::1', 'auth', '2024-04-24 18:28:11', '', '-', 'Loopback'),
(785, '::1', 'auth', '2024-04-24 18:28:12', '', '-', 'Loopback'),
(786, '::1', 'auth', '2024-04-24 18:28:32', '', '-', 'Loopback'),
(787, '::1', 'auth', '2024-04-24 18:28:32', '', '-', 'Loopback'),
(788, '::1', 'auth', '2024-04-24 18:28:32', '', '-', 'Loopback'),
(789, '::1', 'auth', '2024-04-24 18:28:33', '', '-', 'Loopback'),
(790, '::1', 'auth', '2024-04-24 18:28:33', '', '-', 'Loopback'),
(791, '::1', 'auth', '2024-04-24 18:28:33', '', '-', 'Loopback'),
(792, '::1', 'auth', '2024-04-24 18:28:34', '', '-', 'Loopback'),
(793, '::1', 'auth', '2024-04-24 18:28:34', '', '-', 'Loopback'),
(794, '::1', 'auth', '2024-04-24 18:28:35', '', '-', 'Loopback'),
(795, '::1', 'auth', '2024-04-24 18:28:35', '', '-', 'Loopback'),
(796, '::1', 'auth', '2024-04-24 18:28:40', '', '-', 'Loopback'),
(797, '::1', 'auth', '2024-04-24 18:28:41', '', '-', 'Loopback'),
(798, '::1', 'auth/logout', '2024-04-24 18:28:41', '', '-', 'Loopback'),
(799, '::1', '', '2024-04-24 18:28:41', '', '-', 'Loopback'),
(800, '::1', 'auth', '2024-04-24 18:28:48', '', '-', 'Loopback'),
(801, '::1', 'auth/logout', '2024-04-24 18:35:10', 'Paulus Christofel S', '-', 'Loopback'),
(802, '::1', '', '2024-04-24 18:35:11', '', '-', 'Loopback'),
(803, '::1', 'auth', '2024-04-24 18:35:17', '', '-', 'Loopback'),
(804, '::1', 'dashboard', '2024-04-24 18:35:17', 'Paulus Christofel S', '-', 'Loopback'),
(805, '::1', 'auth/logout', '2024-04-24 18:35:45', 'Paulus Christofel S', '-', 'Loopback'),
(806, '::1', '', '2024-04-24 18:35:45', '', '-', 'Loopback'),
(807, '::1', 'auth', '2024-04-24 18:40:38', '', '-', 'Loopback'),
(808, '::1', 'auth', '2024-04-24 18:40:45', '', '-', 'Loopback'),
(809, '::1', 'dashboard', '2024-04-24 18:40:46', 'Paulus Christofel S', '-', 'Loopback'),
(810, '::1', 'dashboard', '2024-04-24 18:42:06', 'Paulus Christofel S', '-', 'Loopback'),
(811, '::1', 'dashboard', '2024-04-24 18:42:32', 'Paulus Christofel S', '-', 'Loopback'),
(812, '::1', 'dashboard', '2024-04-24 18:58:28', 'Paulus Christofel S', '-', 'Loopback'),
(813, '::1', 'dashboard', '2024-04-24 18:59:04', 'Paulus Christofel S', '-', 'Loopback'),
(814, '::1', 'dashboard', '2024-04-24 18:59:21', 'Paulus Christofel S', '-', 'Loopback'),
(815, '::1', 'dashboard', '2024-04-24 18:59:32', 'Paulus Christofel S', '-', 'Loopback'),
(816, '::1', 'dashboard', '2024-04-24 18:59:51', 'Paulus Christofel S', '-', 'Loopback'),
(817, '::1', 'dashboard', '2024-04-24 19:00:27', 'Paulus Christofel S', '-', 'Loopback'),
(818, '::1', 'dashboard', '2024-04-24 19:00:37', 'Paulus Christofel S', '-', 'Loopback'),
(819, '::1', 'dashboard', '2024-04-24 19:07:27', 'Paulus Christofel S', '-', 'Loopback'),
(820, '::1', 'dashboard', '2024-04-24 19:09:21', 'Paulus Christofel S', '-', 'Loopback'),
(821, '::1', 'dashboard', '2024-04-24 19:41:22', 'Paulus Christofel S', '-', 'Loopback'),
(822, '::1', 'dashboard', '2024-04-24 19:43:17', 'Paulus Christofel S', '-', 'Loopback'),
(823, '::1', 'dashboard', '2024-04-24 20:26:22', 'Paulus Christofel S', '-', 'Loopback'),
(824, '::1', 'dashboard', '2024-04-24 20:26:39', 'Paulus Christofel S', '-', 'Loopback'),
(825, '::1', 'dashboard', '2024-04-24 20:57:26', 'Paulus Christofel S', '-', 'Loopback'),
(826, '::1', 'dashboard', '2024-04-24 21:03:07', 'Paulus Christofel S', '-', 'Loopback'),
(827, '::1', 'dashboard', '2024-04-24 21:05:08', 'Paulus Christofel S', '-', 'Loopback'),
(828, '::1', 'auth/blocked', '2024-04-24 21:05:15', 'Paulus Christofel S', '-', 'Loopback'),
(829, '::1', 'auth/blocked', '2024-04-24 21:07:08', 'Paulus Christofel S', '-', 'Loopback'),
(830, '::1', 'dashboard', '2024-04-24 21:07:10', 'Paulus Christofel S', '-', 'Loopback'),
(831, '::1', 'auth/blocked', '2024-04-24 21:07:13', 'Paulus Christofel S', '-', 'Loopback'),
(832, '::1', 'dashboard', '2024-04-24 21:07:16', 'Paulus Christofel S', '-', 'Loopback'),
(833, '::1', 'auth/blocked', '2024-04-24 21:07:18', 'Paulus Christofel S', '-', 'Loopback'),
(834, '::1', 'dashboard', '2024-04-24 21:07:21', 'Paulus Christofel S', '-', 'Loopback'),
(835, '::1', 'auth/blocked', '2024-04-24 21:07:25', 'Paulus Christofel S', '-', 'Loopback'),
(836, '::1', 'auth/blocked', '2024-04-24 21:09:25', 'Paulus Christofel S', '-', 'Loopback'),
(837, '::1', 'auth/blocked', '2024-04-24 21:09:29', 'Paulus Christofel S', '-', 'Loopback'),
(838, '::1', 'auth/blocked', '2024-04-24 21:11:36', 'Paulus Christofel S', '-', 'Loopback'),
(839, '::1', 'dashboard', '2024-04-24 21:11:38', 'Paulus Christofel S', '-', 'Loopback'),
(840, '::1', 'auth/blocked', '2024-04-24 21:11:42', 'Paulus Christofel S', '-', 'Loopback'),
(841, '::1', 'auth/blocked', '2024-04-24 21:14:20', 'Paulus Christofel S', '-', 'Loopback'),
(842, '::1', 'auth/blocked', '2024-04-24 21:16:38', 'Paulus Christofel S', '-', 'Loopback'),
(843, '::1', 'dashboard', '2024-04-24 21:31:44', 'Paulus Christofel S', '-', 'Loopback'),
(844, '::1', 'administrator/menu', '2024-04-24 21:31:46', 'Paulus Christofel S', '-', 'Loopback'),
(845, '::1', 'administrator/menu', '2024-04-24 22:13:06', 'Paulus Christofel S', '-', 'Loopback'),
(846, '::1', 'administrator/menu', '2024-04-24 22:13:52', 'Paulus Christofel S', '-', 'Loopback'),
(847, '::1', 'administrator/menu', '2024-04-24 22:14:08', 'Paulus Christofel S', '-', 'Loopback'),
(848, '::1', 'administrator/menu', '2024-04-24 22:15:02', 'Paulus Christofel S', '-', 'Loopback'),
(849, '::1', 'dashboard', '2024-04-24 22:16:34', 'Paulus Christofel S', '-', 'Loopback'),
(850, '::1', 'administrator/menu', '2024-04-24 22:16:37', 'Paulus Christofel S', '-', 'Loopback'),
(851, '::1', 'administrator/menu', '2024-04-24 22:17:16', 'Paulus Christofel S', '-', 'Loopback'),
(852, '::1', 'auth/blocked', '2024-04-24 22:17:16', 'Paulus Christofel S', '-', 'Loopback'),
(853, '::1', 'auth/blocked', '2024-04-24 22:17:17', 'Paulus Christofel S', '-', 'Loopback'),
(854, '::1', 'administrator/menu', '2024-04-24 22:17:48', 'Paulus Christofel S', '-', 'Loopback'),
(855, '::1', 'administrator/menu', '2024-04-24 22:18:35', 'Paulus Christofel S', '-', 'Loopback'),
(856, '::1', 'administrator/menu', '2024-04-24 22:18:59', 'Paulus Christofel S', '-', 'Loopback'),
(857, '::1', 'administrator/menu', '2024-04-24 22:19:54', 'Paulus Christofel S', '-', 'Loopback'),
(858, '::1', 'dashboard', '2024-04-24 22:20:00', 'Paulus Christofel S', '-', 'Loopback'),
(859, '::1', 'administrator/menu', '2024-04-24 22:20:02', 'Paulus Christofel S', '-', 'Loopback'),
(860, '::1', 'administrator/menu', '2024-04-24 22:57:02', 'Paulus Christofel S', '-', 'Loopback'),
(861, '::1', 'administrator/role', '2024-04-24 22:57:16', 'Paulus Christofel S', '-', 'Loopback'),
(862, '::1', 'administrator/menu', '2024-04-24 22:57:17', 'Paulus Christofel S', '-', 'Loopback'),
(863, '::1', 'administrator/menu', '2024-04-24 22:57:51', 'Paulus Christofel S', '-', 'Loopback'),
(864, '::1', 'administrator/menu', '2024-04-24 22:57:54', 'Paulus Christofel S', '-', 'Loopback'),
(865, '::1', 'administrator/menu', '2024-04-24 22:59:00', 'Paulus Christofel S', '-', 'Loopback'),
(866, '::1', 'administrator/menu', '2024-04-24 22:59:41', 'Paulus Christofel S', '-', 'Loopback'),
(867, '::1', 'administrator/menu', '2024-04-24 22:59:45', 'Paulus Christofel S', '-', 'Loopback'),
(868, '::1', 'administrator/menu', '2024-04-24 23:00:16', 'Paulus Christofel S', '-', 'Loopback'),
(869, '::1', 'dashboard', '2024-04-24 23:00:56', 'Paulus Christofel S', '-', 'Loopback'),
(870, '::1', 'dashboard', '2024-04-24 23:03:55', 'Paulus Christofel S', '-', 'Loopback'),
(871, '::1', 'administrator/menu', '2024-04-24 23:03:58', 'Paulus Christofel S', '-', 'Loopback'),
(872, '::1', 'administrator/menu', '2024-04-24 23:04:02', 'Paulus Christofel S', '-', 'Loopback'),
(873, '::1', 'administrator/menu', '2024-04-24 23:04:29', 'Paulus Christofel S', '-', 'Loopback'),
(874, '::1', 'administrator/menu', '2024-04-24 23:04:31', 'Paulus Christofel S', '-', 'Loopback'),
(875, '::1', 'administrator/menu', '2024-04-24 23:04:34', 'Paulus Christofel S', '-', 'Loopback'),
(876, '::1', 'administrator/menu', '2024-04-24 23:04:48', 'Paulus Christofel S', '-', 'Loopback'),
(877, '::1', 'dashboard', '2024-04-24 23:04:56', 'Paulus Christofel S', '-', 'Loopback'),
(878, '::1', 'administrator/menu', '2024-04-24 23:04:59', 'Paulus Christofel S', '-', 'Loopback'),
(879, '::1', 'dashboard', '2024-04-24 23:05:02', 'Paulus Christofel S', '-', 'Loopback'),
(880, '::1', 'administrator/menu', '2024-04-24 23:05:04', 'Paulus Christofel S', '-', 'Loopback'),
(881, '::1', 'administrator/menu', '2024-04-24 23:07:11', 'Paulus Christofel S', '-', 'Loopback'),
(882, '::1', 'dashboard', '2024-04-24 23:07:14', 'Paulus Christofel S', '-', 'Loopback'),
(883, '::1', 'administrator/menu', '2024-04-24 23:07:16', 'Paulus Christofel S', '-', 'Loopback'),
(884, '::1', 'administrator/menu', '2024-04-24 23:08:30', 'Paulus Christofel S', '-', 'Loopback'),
(885, '::1', 'administrator/menu', '2024-04-24 23:16:05', 'Paulus Christofel S', '-', 'Loopback'),
(886, '::1', 'administrator/menu', '2024-04-24 23:16:50', 'Paulus Christofel S', '-', 'Loopback'),
(887, '::1', 'administrator/menu', '2024-04-24 23:21:14', 'Paulus Christofel S', '-', 'Loopback'),
(888, '::1', 'administrator/menu', '2024-04-24 23:21:30', 'Paulus Christofel S', '-', 'Loopback'),
(889, '::1', 'administrator/menu', '2024-04-24 23:22:10', 'Paulus Christofel S', '-', 'Loopback'),
(890, '::1', 'administrator/menu', '2024-04-24 23:22:18', 'Paulus Christofel S', '-', 'Loopback'),
(891, '::1', 'administrator/menu', '2024-04-24 23:24:04', 'Paulus Christofel S', '-', 'Loopback'),
(892, '::1', 'administrator/menu', '2024-04-24 23:24:56', 'Paulus Christofel S', '-', 'Loopback'),
(893, '::1', 'administrator/menu', '2024-04-24 23:25:40', 'Paulus Christofel S', '-', 'Loopback'),
(894, '::1', 'auth', '2024-04-25 13:37:48', '', '-', 'Loopback'),
(895, '::1', 'auth', '2024-04-25 13:37:54', '', '-', 'Loopback'),
(896, '::1', 'dashboard', '2024-04-25 13:37:54', 'Paulus Christofel S', '-', 'Loopback'),
(897, '::1', 'administrator/menu', '2024-04-25 13:37:58', 'Paulus Christofel S', '-', 'Loopback'),
(898, '::1', 'administrator/role', '2024-04-25 13:38:05', 'Paulus Christofel S', '-', 'Loopback'),
(899, '::1', 'administrator/menu', '2024-04-25 13:38:08', 'Paulus Christofel S', '-', 'Loopback');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menus`
--

CREATE TABLE `tb_menus` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `destinationUrl` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `menu_level` enum('header','sub_menu_lv1','sub_menu_lv2','main_menu') NOT NULL DEFAULT 'main_menu',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `createdby` varchar(128) NOT NULL,
  `createdtime` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menus`
--

INSERT INTO `tb_menus` (`menu_id`, `parent_id`, `title`, `url`, `destinationUrl`, `icon`, `menu_level`, `is_active`, `createdby`, `createdtime`, `menu_order`) VALUES
(1, NULL, 'Dashboard', 'dashboard', NULL, 'fa fa-grav', 'main_menu', '1', 'Paulus Christofel S', 112312, 1),
(2, NULL, 'Administrator', 'administrator', NULL, 'fa fa-cogs', 'header', '1', 'Paulus Christofel S', 12673612, 2),
(3, 2, 'Menu Management', 'administrator/menu', 'menu', NULL, 'sub_menu_lv1', '1', 'Paulus Christofel S', 123123, 1),
(4, 2, 'User Role', 'administrator/role', 'role', NULL, 'sub_menu_lv1', '1', 'Paulus Christofel S', 2123123, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(87) NOT NULL,
  `user_contact` varchar(25) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `user_name`, `email`, `user_contact`, `role_id`, `is_active`) VALUES
('UPOS2403-0001', 'pythpal20', '$2y$10$xEzJzCCvIOJIC4HI.Y2lSeR5aayx9fsHalPEXU3kjVG2EOl3ayugW', 'Paulus Christofel S', 'pchristofels@gmail.com', '081214098020', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(65, 1, 1),
(66, 1, 2),
(67, 1, 3),
(68, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `nourut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `nourut`) VALUES
(1, 'Dashboard', 1),
(2, 'Administrator', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL COMMENT 'Devisi',
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`, `keterangan`) VALUES
(1, 'IT Administrator', 'All IT Team, all access');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` enum('0','1') NOT NULL COMMENT '0 = Nonaktif, 1 = aktif',
  `created_date` int(11) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `nourutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `created_date`, `created_by`, `nourutan`) VALUES
(16, 2, 'Menu Management', 'administrator/menu', 'fa fa-cog', '1', NULL, NULL, 1),
(17, 2, 'User Role', 'administrator/role', 'fa fa-cogs', '1', 1706864824, 'Paulus Christofel S', 2),
(18, 1, 'Dashboard', 'dashboard', 'fa fa-th-large', '1', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900;

--
-- AUTO_INCREMENT untuk tabel `tb_menus`
--
ALTER TABLE `tb_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
