-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `takeshi_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `genre` varchar(32) NOT NULL,
  `url` text NOT NULL,
  `story` text NOT NULL,
  `cast` text NOT NULL,
  `bookmark` varchar(12) NOT NULL,
  `date` datetime NOT NULL,
  `user_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `title`, `genre`, `url`, `story`, `cast`, `bookmark`, `date`, `user_name`) VALUES
(1, 'クィーンズ・ギャンビット', '社会派', 'https://www.netflix.com/jp/title/80234304', '1950年代の児童養護施設で、人並外れたチェスの才能を開花させた少女は、依存症に苦しみながら、想像もしていなかった華やかなスターへの道を歩いていく。', 'アニャ・テイラー、ビル・キャンプ', '★', '2020-12-28 13:14:10', 'sugahara takeshi'),
(2, 'エミリー、パリへ行く', 'TV番組ドラマ', 'https://www.netflix.com/jp/title/81037371', 'シカゴでマーケティングの仕事に励んでいたエミリー・クーパーは、思いがけずパリで念願の職を手に入れ、仕事に恋に友情に全力投球の夢の海外生活を開始する。', 'リリー・コリンズ、アシュリー・パーク', '　', '2021-01-22 10:48:45', 'satou makoto'),
(3, '全裸監督', '国内ドラマ', 'https://www.netflix.com/jp/title/80239462', 'バブル景気に沸いた1980年代の日本に、逆境をチャンスに変えた奴がいた。男の名は村西とおる。彼こそが、エロの概念を覆し、AV業界に革命を起こした伝説の風雲児。', '山田孝之、満島真之介、玉山鉄二、森田望智', '　', '2020-12-28 13:14:10', 'sugahara takeshi'),
(4, '愛の不時着', 'コメディ', 'https://www.netflix.com/jp/title/81159258', 'パラグライダー中に思わぬ事故に巻き込まれ、北朝鮮に不時着してしまった韓国の財閥令嬢。そこで出会った堅物の将校の家で、身分を隠して暮らすことになるが...。', 'ヒョンビン、ソン・イェジン、ソ・ジヘ', '', '2020-12-28 22:48:45', 'tanaka satoru'),
(5, 'ザ・クラウン', '社会派', 'https://www.netflix.com/jp/title/80025678', '英国君主、エリザベス2世。政界実力者との確執、王室のロマンス、そして20世紀後半を彩る歴史的事件の影で葛藤する、生身の女王の姿を重厚に描いた大作ドラマ。', 'オリヴィア・コールマン、ヘレナ・ボナム＝カーター、トビアス・メンジーズ', '★', '2021-01-01 19:18:56', '	\r\ntanaka satoru'),
(6, '深夜食堂', '国内ドラマ', 'https://www.netflix.com/jp/title/80113037', '深夜にしか営業しない飯屋ののれんをくぐると、そこには素朴で心温まる料理が。思い入れのある一皿に添えられた物語が、めしやに集う人々の人間模様を描いてゆく。', '小林薫、不破万作、綾田俊樹', '★', '2020-12-29 16:49:00', '	\r\nsaito satosi'),
(7, 'Sherlock/シャーロック', 'ミステリー', 'https://www.netflix.com/jp/title/70202589', 'アーサー・コナン・ドイルの名作小説が現代を舞台に蘇る。手がかりを求めロンドンの街を駆け回る破天荒な名探偵の活躍をスタイリッシュに描くミステリードラマ。', 'ベネディクト・カンバーバッチ、マーティン・フリーマン、ユーナ・スタッブス', '　', '2020-12-29 16:49:00', 'ebihara hiroshi'),
(15, 'テストどらま', 'コメディ', '', '', '', '★', '2021-01-19 22:34:31', 'tanaka satoru'),
(17, 'テストどらま3', 'コメディ', 'aaa.bbb.co.jp', 'テスト', '次郎', '', '2021-01-21 16:24:39', 'tanaka satoru');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(255) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'sugahara takeshi', 'sugatake', '$2y$10$3UPNNmt5Le43Wh7dedVFoOBWuhZw.jScTZufMC/ar7hKPty0agd7e', 1, 1),
(2, 'satou makoto', 'torasan', '$2y$10$I84MLAh.2foiHy8tnwoBy.gEAFSCIl6WoQ9LQTwNxpRxxJ.SEpr0O', 0, 1),
(3, 'tanaka satoru', 'satoru', '$2y$10$Mpu9c/jwIOJSdMgpso2VwO3a1YFQsVd/V.3bNBSC.Dtn3MdM43Npq', 0, 0),
(4, 'saito satosi', 'hamustar', '$2y$10$Rm78TVTP7da2MXFDfoVts.6RELav67ShFMnjYXNKNJeI9Z5l/fe0a', 1, 0),
(5, 'maruyama hirotaka', 'marusan', '$2y$10$cdVby4m1Al6AB/ZTEqnSrO2AgzilteiMF5OYl.rWWGxa9uZ//mw2m', 1, 0),
(6, 'abe yasuhiro', 'abechan2', '$2y$10$LJO8gdZ4wcuJxcjV.KVRneDUDWFdEIWi1UA6NKm/EgkBDSpfagx0i', 0, 1),
(8, 'ebihara hiroshi', 'ebii2', '$2y$10$.aMGgw5c08x3gsRGyFavg.aMm2a3EwpXj3/DSxcNMkKxnciUwPSem', 0, 1),
(9, 'hashimoto kazuo', 'hasikazu', '$2y$10$MzEojRP4oXGvmVbrn6a9zuFYl0I08CUVOr8Jf9hNWM9Ixeoh0fwcW', 0, 1),
(11, 'yamamoto masaru', 'bom', '$2y$10$LqdZjVGZjR7q6y7aesfQ1.VugPAfxtsziINUV78nEzAPOvRzWreZq', 0, 1),
(12, 'yosida masaru', 'yoshi', '$2y$10$E0HxZ1c52A3QZ1VaSnm06O.9.cMdqtLDt1uTCla5HuDb/rs0gOCzS', 0, 1),
(14, 'goto noriyuki', 'goto', '$2y$10$EBg6iQQgpWNztOq/vyEbauF/yQTEf4ol5dylPfqx3SX9IwE055pky', 1, 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
