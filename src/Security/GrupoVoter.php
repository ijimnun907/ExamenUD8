<?php

namespace App\Security;

use App\Entity\Grupo;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class GrupoVoter extends Voter
{

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    const EDIT = 'GRUPO_EDIT';

    protected function supports(string $attribute, $subject)
    {
        if (!in_array($attribute, [
            self::EDIT
        ], true)){
            return false;
        }

        if (!$subject instanceof Grupo){
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        assert($subject instanceof Grupo);

        switch ($attribute) {
            case self::EDIT:
                return $this->security->isGranted("ROLE_DIRECTIVO") || $subject->getTutor() === $user;
                break;
        }

        return false;
    }
}