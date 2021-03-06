<?php

namespace PTK\Info;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::GREEN . "[Info] §cĐã hoạt động!");
	}
	
	public function onDisable(){
		$this->getLogger()->info(TextFormat::RED . "[Info] Đã dừng!");
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "helps":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §aHướng Dẫn Cách Chơi§e |§c♦§e|§a=-");
			   $sender->sendMessage("§a∘ §bĐể chơi SkyBlock  bạn hãy sử dụng lệnh /sb help");
			   $sender->sendMessage("§a∘ §dĐể đến các khu tiện ích của server hãy sử dụng lệnh /khu <Tên Khu> và /listkhu để xem các khu");
			   $sender->sendMessage("§a∘ §aChúc bạn chơi vui vẻ");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;
			case "cachvote":
			   $sender->sendMessage("§b[§c❤§eVote-Reward§c❤§b]§a Cách Vote Cho Máy Chủ:");
			   $sender->sendMessage("§b•»§a Bước 1: Truy Cập Trang Web https://bit.do/***");
			   $sender->sendMessage("§b•»§a Bước 2: Điền Tên Của Bạn Vào Khung Và Tích Vào Ô Tôi Không Phải Là Người Máy Rồi Ấn Vào Nút Vote");
			   $sender->sendMessage("§b•»§a Bước 3: Bạn Vào Lại Máy Chủ Ghi Lệnh /vote Nếu Bạn Có 1 Cây Cúp Muốn Phù Phép Thì Hãy Cầm Nó Trên Tay Và Ghi /vote");
			   return true;
			case "luat":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dQuy Định - Luật Chơi |§c♦§e|§a=-");
			   $sender->sendMessage("§c♦ §aKhông sử dụng các phần mềm cheat Hack...");
			   $sender->sendMessage("§c♦ §aKhông nói tục chửi thề hay gây War...");
			   $sender->sendMessage("§c♦ §aCác trường hợp khác tuỳ mức độ và hành vi. Chúng tôi sẽ xử lí sau.");
			   $sender->sendMessage("§c♦ §aKhông quảng cáo, Spam Chat trên khung chat server.");
			   $sender->sendMessage("§c♦ §aKhông tự ý giao dịch để tránh bị lừa dảo trong server.");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;			
			case "lag":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dCách Giảm Lagg§e |§c♦§e|§a=-");
			   $sender->sendMessage("§eCách 1:§b Vào Settings->Video-> Tắt View Bobbing, Fancy Graphics, Beautiful Skies");
			   $sender->sendMessage("§eCách 2:§b Vào Settings->Video-> Bật Show Advanced...phần Render Distance kéo xuống 4 Chunks");
			  // $sender->sendMessage("§eCách 3:§b ");
			   $sender->sendMessage("§dNếu bạn còn cách nào hay hơn hãy chia sẻ ngay bằng cách §f/idea <tên> <note>");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;
			case "info":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dGiới Thiệu Thông Tin |§c♦§e|§a=-");
			   $sender->sendMessage("§7∘ §bChào mừng đến với server");
			   $sender->sendMessage("§7∘ §aMinecraft là game sáng tạo trong thế giới ảo, xây dựng trở thành vua của thế giới");
			   $sender->sendMessage("§7∘ §bChắc hẳn ở Việt Nam rất nhiều máy chủ hay mạnh và tối ưu hơn ");
			   $sender->sendMessage("§7∘ §aServer§6 thành lập ngày §b**/**/**** §avà cũng là ngày mở cửa chính thức");
			   $sender->sendMessage("§7∘ §aServer§6 cũng là một máy chủ mới nhưng nhiều kinh nghiệm");
			   $sender->sendMessage("§7∘ §aServer§6 có các chế độ chơi đa dạng đáp ứng nhu cầu của các bạn");
			   $sender->sendMessage("§7∘ §eHệ thống cũng đã việt hóa phần nào để tiện cho người chơi");
			   $sender->sendMessage("§7∘ §6Skyblock – Đảo trên trời");
			   $sender->sendMessage("§7∘ §bMột phần nhỏ các chế độ chơi của §aServer");
			   $sender->sendMessage("§7∘ §aServer§6 cần sự ủng hộ của các bạn, đó là động lực giúp §aServer§6 phát triển hơn");
			   $sender->sendMessage("§7∘ §aChúc các bạn có 1 ngày chơi vui vẻ!");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;
			case "thongbao":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dThông Báo - Tuyển Dụng§e |§c♦§e|§a=-");
			   $sender->sendMessage("§d► All Rank Trừ OP Owner Admin");
			   $sender->sendMessage("§r- Yêu cầu các bạn bắt buộc phải am hiểu về Minecraft và server ");
			   $sender->sendMessage("§r- Thời gian onl tổi thiểu 3-5 giờ/1 ngày");
			   $sender->sendMessage("§r- Nhiệt tình trả lời và trợ giúp các new member");
			   $sender->sendMessage("§1► Police Team");
			   $sender->sendMessage("§r- Yêu cầu các bạn phải có kĩ năng phân biệt và phát hiện hack cheat");
			   $sender->sendMessage("§r- Thời gian online tối thiểu 3-5 giờ/1 ngày");
			   $sender->sendMessage("§r- Có sức nhẫn nhịn chịu đựng áp lực trước trẻ em, biết cư xử đúng mực");
			   $sender->sendMessage("§r- Không lạm quyền bừa bãi, xử phạt theo tư cách cá nhân");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;
			case "giavip":
			   $sender->sendMessage("§r§a-=§e|§c♦§e| §dBảng Giá Vip§e |§c♦§e|§a=-");
			   $sender->sendMessage("§b►§a20 VND = Vip1.");
			   $sender->sendMessage("§b►§a50 VND = Vip2.");
			   $sender->sendMessage("§b►§a100 VND = Vip3.");
			   $sender->sendMessage("§o§9▃§b▃§a▃§e▃§6▃§c▃§4▃§2▃§d▃§f▃§7▃§8▃§5▃§1▃§0▃");
			   return true;
			default:
			   return false;
		}
	}
}