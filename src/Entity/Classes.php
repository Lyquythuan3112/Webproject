
namespace App\Entity;

use App\Repository\ClassesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassesRepository::class)]
class Classes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Types = null;

    #[ORM\Column]
    private ?float $Quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getTypes(): ?string
    {
        return $this->Types;
    }

    public function setTypes(string $Types): self
    {
        $this->Types = $Types;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    public function setQuantity(float $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }
}
